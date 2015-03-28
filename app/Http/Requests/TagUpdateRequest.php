<?php namespace Learn\Http\Requests;

use Learn\Http\Requests\Request;

class TagUpdateRequest extends Request {

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
            'slug' => 'required|string|max:100|unique:tags,slug,' . $this->route('id'),
            'description' => 'string'
		];
	}

}
