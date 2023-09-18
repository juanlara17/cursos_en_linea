<?php

namespace App\Http\Requests\ThreadReply;

use App\Models\ThreadReply;
use App\Http\Resources\Models\ThreadReplyResource;
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

        $threadReply = ThreadReply::findOrFail($this->thread_reply_id);

        return $this->user()->can('view', $threadReply);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ThreadReply::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ThreadReply::$loadable_counts)
            ],
            'thread_reply_id' => 'required|numeric'
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

        $threadReply = ThreadReply::where('id', $this->thread_reply_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ThreadReplyResource($threadReply);

    }
    
}
