<?php

namespace App\Http\Requests\Answer;

use App\Models\Answer;
use App\Http\Resources\Models\AnswerResource;
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

        $answer = Answer::findOrFail($this->answer_id);

        return $this->user()->can('view', $answer);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Answer::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Answer::$loadable_counts)
            ],
            'answer_id' => 'required|numeric'
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

        $answer = Answer::where('id', $this->answer_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new AnswerResource($answer);

    }
    
}
