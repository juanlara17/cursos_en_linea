<?php

namespace App\Http\Requests\ForumSubscription;

use App\Models\ForumSubscription;
use App\Http\Resources\Models\ForumSubscriptionResource;
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

        $forumSubscription = ForumSubscription::findOrFail($this->forum_subscription_id);

        return $this->user()->can('view', $forumSubscription);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ForumSubscription::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ForumSubscription::$loadable_counts)
            ],
            'forum_subscription_id' => 'required|numeric'
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

        $forumSubscription = ForumSubscription::where('id', $this->forum_subscription_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ForumSubscriptionResource($forumSubscription);

    }
    
}
