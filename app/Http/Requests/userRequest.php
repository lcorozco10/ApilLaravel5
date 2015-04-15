<?php namespace Myapi\Http\Requests;
//use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Response;

class userRequest extends Request {

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
			//
            'user_name' => 'required|unique:users|max:255',
            'password' => 'required',
            'email' => 'required|unique:users|max:255',
            'roll' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'website' => 'required',
            'description' => 'required',
            'twitter' => 'required',
            'birth_date' => 'required',
            'avatar_url' => 'required',
            'identification' => 'required|unique:users_profiles|max:255',
		];
	}


    public function response(array $errors)
    {
        return Response::json(array(
            'error' => false,
            'urls' => $errors
            ),
            202
        );
    }
}
