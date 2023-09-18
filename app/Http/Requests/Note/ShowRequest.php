<?php

namespace App\Http\Requests\Note;

use App\Models\Note;
use App\Http\Resources\Models\NoteResource;
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

        $note = Note::findOrFail($this->note_id);

        return $this->user()->can('view', $note);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Note::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Note::$loadable_counts)
            ],
            'note_id' => 'required|numeric'
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

        $note = Note::where('id', $this->note_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new NoteResource($note);

    }
    
}
