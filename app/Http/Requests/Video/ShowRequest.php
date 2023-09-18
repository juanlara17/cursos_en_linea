<?php

namespace App\Http\Requests\Video;

use App\Models\Video;
use App\Http\Resources\Models\VideoResource;
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

        $video = Video::findOrFail($this->video_id);

        return $this->user()->can('view', $video);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Video::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Video::$loadable_counts)
            ],
            'video_id' => 'required|numeric'
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

        $video = Video::where('id', $this->video_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new VideoResource($video);

    }
    
}
