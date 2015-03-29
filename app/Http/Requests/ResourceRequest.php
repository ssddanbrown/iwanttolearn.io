<?php namespace Learn\Http\Requests;

use Learn\Http\Requests\Request;

class ResourceRequest extends Request {

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
            'link' => 'required|string|url|max:250',
            'cost' => 'required|in:free,paid,both',
            'description' => 'string'
		];
	}

}
