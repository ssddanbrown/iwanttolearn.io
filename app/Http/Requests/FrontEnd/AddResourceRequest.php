<?php namespace Learn\Http\Requests\FrontEnd;

use Learn\Http\Requests\Request;

class AddResourceRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $rules = [
            'email' => 'required|email',
            'extra-link' => 'required|string|url',
            'extra-message' => 'string'
        ];

        if (env('APP_ENV') != 'testing') {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

		return $rules;
	}

}
