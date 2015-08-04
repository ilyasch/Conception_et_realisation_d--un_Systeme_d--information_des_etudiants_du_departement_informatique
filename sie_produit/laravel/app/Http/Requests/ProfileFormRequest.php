<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ProfileFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        if(Auth::user()->is_verified == 1)
            return true;
        //TODO: afficher page d'errors
        echo "<p>Désolé, vous n'avez pas validé votre email</p>";
		return false;
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
            'name' => 'required',
            'email' => 'required|email',
            'data' => 'required',
		];
	}

}
