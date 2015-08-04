<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PfeFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        /* Modifie par encadrant
        $etd = Auth::user();
		return $etd->inscris6();
        */
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
            'InputName' => 'required|max:10',
            'Inputcode' => 'required|max:10',
            'Inputemail' => 'required|email',

            'Inputbinome' => 'required|max:10',
            'Inputcodebinome' => 'required|max:10',
            'Inputemailbinome' => 'required|email',
		];
	}

}
