<?php

namespace App\Http\Requests\Path;

use App\Models\Path;
use App\Http\Resources\Models\PathResource;
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

        $path = Path::findOrFail($this->path_id);

        return $this->user()->can('view', $path);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Path::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Path::$loadable_counts)
            ],
            'path_id' => 'required|numeric'
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

        $path = Path::where('id', $this->path_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new PathResource($path);

    }
    
}
