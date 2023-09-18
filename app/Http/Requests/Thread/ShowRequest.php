<?php

namespace App\Http\Requests\Thread;

use App\Models\Thread;
use App\Http\Resources\Models\ThreadResource;
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

        $thread = Thread::findOrFail($this->thread_id);

        return $this->user()->can('view', $thread);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Thread::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Thread::$loadable_counts)
            ],
            'thread_id' => 'required|numeric'
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

        $thread = Thread::where('id', $this->thread_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ThreadResource($thread);

    }
    
}
