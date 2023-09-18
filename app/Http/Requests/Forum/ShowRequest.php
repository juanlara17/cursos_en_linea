<?php

namespace App\Http\Requests\Forum;

use App\Models\Forum;
use App\Http\Resources\Models\ForumResource;
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

        $forum = Forum::findOrFail($this->forum_id);

        return $this->user()->can('view', $forum);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Forum::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Forum::$loadable_counts)
            ],
            'forum_id' => 'required|numeric'
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

        $forum = Forum::where('id', $this->forum_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ForumResource($forum);

    }
    
}
