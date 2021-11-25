<?php


namespace App\Services\Requests;


use App\Services\Response\ResponseServices;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Nette\Schema\ValidationException;

class ApiRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            ResponseServices::sendJsonResponse(
                false,
                JsonResponse::HTTP_FORBIDDEN,
                $errors
            )
        );
    }
}
