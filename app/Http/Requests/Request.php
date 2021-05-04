<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;
use Config;

class Request extends FormRequest
{
    private const UNDEFINED_FIELD_TYPE = '100';
    private const UNDEFINED_RULE = '00';

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'meta' => [
                    'status' => $this->errorCode($validator),
                    'pagination' => null
                ],
                'data' => null
            ], Response::HTTP_BAD_REQUEST)
        );
    }

    public function errorCode($validator)
    {
        if (!$validator->messages()->isEmpty()) {
            $field = Arr::get($validator->messages()->keys(), 0);
            $rule = strtolower(current(array_keys(Arr::get($validator->failed(), $field))));
            $fieldType = Arr::first(explode('.', $field));
            return Config::get('validator.fields.' . $fieldType, self::UNDEFINED_FIELD_TYPE) . Config::get('validator.rules.' . $rule, self::UNDEFINED_RULE);
        }
        return self::UNDEFINED_FIELD_TYPE . self::UNDEFINED_RULE;
    }
}
