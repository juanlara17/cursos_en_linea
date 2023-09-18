<?php

namespace App\Http\Requests\Submission;

use App\Models\Submission;
use App\Http\Resources\Models\SubmissionResource;
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

        $submission = Submission::findOrFail($this->submission_id);

        return $this->user()->can('view', $submission);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Submission::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Submission::$loadable_counts)
            ],
            'submission_id' => 'required|numeric'
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

        $submission = Submission::where('id', $this->submission_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new SubmissionResource($submission);

    }
    
}
