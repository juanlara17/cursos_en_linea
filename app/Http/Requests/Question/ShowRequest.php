<?php

namespace App\Http\Requests\Question;

use App\Models\Question;
use App\Http\Resources\Models\QuestionResource;
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

        $question = Question::findOrFail($this->question_id);

        return $this->user()->can('view', $question);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Question::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Question::$loadable_counts)
            ],
            'question_id' => 'required|numeric'
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

        $question = Question::where('id', $this->question_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new QuestionResource($question);

    }
    
}
