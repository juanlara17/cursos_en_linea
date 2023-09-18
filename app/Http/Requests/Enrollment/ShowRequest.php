<?php

namespace App\Http\Requests\Enrollment;

use App\Models\Enrollment;
use App\Http\Resources\Models\EnrollmentResource;
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

        $enrollment = Enrollment::findOrFail($this->enrollment_id);

        return $this->user()->can('view', $enrollment);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Enrollment::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Enrollment::$loadable_counts)
            ],
            'enrollment_id' => 'required|numeric'
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

        $enrollment = Enrollment::where('id', $this->enrollment_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new EnrollmentResource($enrollment);

    }
    
}
