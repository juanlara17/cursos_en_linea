<?php

namespace App\Http\Requests\Section;

use App\Models\Section;
use App\Http\Resources\Models\SectionResource;
use App\Http\Events\Section\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        return $this;
        return $this->user()->can('create', Section::class);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'order' => 'nullable|numeric',
            'course_id' => 'required|numeric|exists:courses,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe exceder los 255 caracteres.',
            'order.numeric' => 'El campo orden debe ser un valor numérico.',
            'course_id.required' => 'El campo ID del curso es obligatorio.',
            'course_id.numeric' => 'El campo ID del curso debe ser un valor numérico.',
            'course_id.exists' => 'El curso seleccionado no existe en la base de datos.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'order' => 'Orden',
            'course_id' => 'ID del Curso'
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle()
    {

        $section = (new Section)->createModel($this);

        $response = new SectionResource($section);

        event(new CreateEvent($section, $this->all(), $response));

        return $response;

    }

}
