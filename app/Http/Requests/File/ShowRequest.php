<?php

namespace App\Http\Requests\File;

use App\Models\File;
use App\Http\Resources\Models\FileResource;
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

        $file = File::findOrFail($this->file_id);

        return $this->user()->can('view', $file);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(File::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(File::$loadable_counts)
            ],
            'file_id' => 'required|numeric'
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

        $file = File::where('id', $this->file_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new FileResource($file);

    }
    
}
