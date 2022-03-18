<?php

namespace  App\Http\Requests;

use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class ApiFormRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        $e = (new ValidationException($validator));

        throw new GeneralException(collect($e->errors())->first()[0],$e->getTrace(),config('constants.status_code.unprocessable_entity'));
    }
    public function validationData(): array
    {
        return $this->all() + $this->json()->all() + $this->route()->parameters;
    }
    public abstract function rules();
}
