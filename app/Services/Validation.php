<?php namespace Learn\Services;

use Illuminate\Validation\Validator;

class Validation extends Validator {

    public function validateCaptcha($attribute, $value, $parameters)
    {
        $captchaService = app()->make('Learn\Services\CaptchaService');
        return $captchaService->validateCaptcha($value);
    }

}