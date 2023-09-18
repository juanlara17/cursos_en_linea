<?php

namespace App\Http\Requests\Resource;

use App\Models\Resource;
use App\Http\Resources\Models\ResourceResource;
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

        $resource = Resource::findOrFail($this->resource_id);

        return $this->user()->can('view', $resource);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Resource::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Resource::$loadable_counts)
            ],
            'resource_id' => 'required|numeric'
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

        $resource = Resource::where('id', $this->resource_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ResourceResource($resource);

    }
    
}
