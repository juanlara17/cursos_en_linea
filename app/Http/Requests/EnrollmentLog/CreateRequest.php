<?php

namespace App\Http\Requests\EnrollmentLog;

use App\Models\EnrollmentLog;
use App\Http\Resources\Models\EnrollmentLogResource;
use App\Http\Events\EnrollmentLog\Events\CreateEvent;
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

        return $this->user()->can('create', EnrollmentLog::class);

    }

    public function rules()
    {
        return [
            //
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

        $enrollmentLog = (new EnrollmentLog)->createModel($this);

        $response = new EnrollmentLogResource($enrollmentLog);

        event(new CreateEvent($enrollmentLog, $this->all(), $response));

        return $response;

    }
    
}
