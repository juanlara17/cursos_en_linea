<?php

namespace App\Http\Requests\EnrollmentLog;

use App\Models\EnrollmentLog;
use App\Http\Resources\Models\EnrollmentLogResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $enrollmentLog = EnrollmentLog::findOrFail($this->enrollment_log_id);

        return $this->user()->can('view', $enrollmentLog);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(EnrollmentLog::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(EnrollmentLog::$loadable_counts)
            ],
            'enrollment_log_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            //
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle()
    {

        $enrollmentLog = EnrollmentLog::where('id', $this->enrollment_log_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new EnrollmentLogResource($enrollmentLog);

    }
    
}
