<?php

namespace App\Http\Requests\Homework;

use App\Models\Homework;
use App\Http\Resources\Models\HomeworkResource;
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

        $homework = Homework::findOrFail($this->homework_id);

        return $this->user()->can('view', $homework);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Homework::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Homework::$loadable_counts)
            ],
            'homework_id' => 'required|numeric'
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

        $homework = Homework::where('id', $this->homework_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new HomeworkResource($homework);

    }
    
}
