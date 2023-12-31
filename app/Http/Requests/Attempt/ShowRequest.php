<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use App\Http\Resources\Models\AttemptResource;
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

        $attempt = Attempt::findOrFail($this->attempt_id);

        return $this->user()->can('view', $attempt);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Attempt::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Attempt::$loadable_counts)
            ],
            'attempt_id' => 'required|numeric'
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

        $attempt = Attempt::where('id', $this->attempt_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new AttemptResource($attempt);

    }
    
}
