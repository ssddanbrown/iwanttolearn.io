<?php namespace Learn\Http\Requests;

use Learn\Http\Requests\Request;

class ArticleRequest extends Request {

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
			'title' => 'string|required|max:250',
            'description' => 'string',
            'link' => 'string|required|url|max:250'
		];
	}

}
