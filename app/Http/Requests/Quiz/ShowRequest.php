<?php

namespace App\Http\Requests\Quiz;

use App\Models\Quiz;
use App\Http\Resources\Models\QuizResource;
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

        $quiz = Quiz::findOrFail($this->quiz_id);

        return $this->user()->can('view', $quiz);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Quiz::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Quiz::$loadable_counts)
            ],
            'quiz_id' => 'required|numeric'
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

        $quiz = Quiz::where('id', $this->quiz_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new QuizResource($quiz);

    }
    
}
