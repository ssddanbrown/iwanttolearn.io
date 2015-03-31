<?php namespace Learn\Http\Requests;

use Learn\Http\Requests\Request;

class UserCreateRequest extends Request {

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
		return [
			'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|same:password-confirm|min:5',
            'password-confirm' => 'required|string|same:password|min:5'
		];
	}

}
