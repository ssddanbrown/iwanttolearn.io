<?php namespace Learn\Http\Requests;

use Learn\Http\Requests\Request;

class FormatCreateRequest extends Request {

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
			'name' => 'string|required|max:100',
            'icon' => 'string|required|max:100',
            'slug' => 'required|string|max:100|unique:tags,slug',
            'plural' => 'string|required|max:100',
            'order' => 'required|integer'
		];
	}

}
