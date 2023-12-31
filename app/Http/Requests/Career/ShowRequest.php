<?php

namespace App\Http\Requests\Career;

use App\Models\Career;
use App\Http\Resources\Models\CareerResource;
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

        $career = Career::findOrFail($this->career_id);

        return $this->user()->can('view', $career);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Career::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Career::$loadable_counts)
            ],
            'career_id' => 'required|numeric'
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

        $career = Career::where('id', $this->career_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new CareerResource($career);

    }
    
}
