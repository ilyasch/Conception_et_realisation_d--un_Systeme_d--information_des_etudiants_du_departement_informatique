<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
        //$this->middleware('guest');
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('welcome');
	}

    public function confirm($code){
        if(!$code)
        {
            throw new InvalidConfirmationCodeException;
        }
        $id = Auth::user()->id;
        $user = User::find($id);
        if (!$user)
        {
            throw new InvalidConfirmationCodeException;
        }
        $user->is_verified = 1;
        $user->verification_code = null;
        $user->save();
        return redirect()->route('/')->with('email_modifier', 'Votre email a été bien vérifié, Have a good time!');
    }
}
