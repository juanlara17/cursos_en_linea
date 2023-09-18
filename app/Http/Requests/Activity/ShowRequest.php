<?php

namespace App\Http\Requests\Activity;

use App\Models\Activity;
use App\Http\Resources\Models\ActivityResource;
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

        $activity = Activity::findOrFail($this->activity_id);

        return $this->user()->can('view', $activity);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Activity::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Activity::$loadable_counts)
            ],
            'activity_id' => 'required|numeric'
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

        $activity = Activity::where('id', $this->activity_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ActivityResource($activity);

    }
    
}
