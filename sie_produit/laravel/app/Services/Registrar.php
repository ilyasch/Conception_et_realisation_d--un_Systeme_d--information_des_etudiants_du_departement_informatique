<?php namespace App\Services;

use App\Etudiant;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use TijsVerkoyen\CssToInlineStyles\Exception;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		$v = Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6|max:20',
            'photo' => 'required|max:15500',
            'fichier' => 'required|max:15500',
            'tel' => 'required|max:15',
            'cin' => 'required|max:10',
            'code' => 'required|max:10',
            'group' => 'required|max:10',
		]);
        if($v->fails())
        {
          //  return redirect()->back()->withErrors($v->errors());
        }
        return $v;
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
     *
	 */
	public function create(array $data)
	{
        $confirmation_code = str_random(30);
            //test section
            $etd = Etudiant::find(1)->where('cin', '=', $data['cin'])
                                    ->where('code', $data['code'])
                                    ->first();
            if($etd != null) {
                    // Send Mail to user for verification
                    //TODO : ->to(modifier ilyas par $data['email && name ...
                    Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function ($message) {
                        $message->to('ilyaschaoua@gmail.com', 'ilyas')
                            ->subject('SIE : Verifier votre adresse email');
                    });

                    //$file = Input::file('photo');
                    $destinationPath = public_path() . '/users_photos/';
                    $filename = 'photo_' . $data['cin'] . '.jpg';
                    Input::file('photo')->move($destinationPath, $filename);


                    //Flash::message('Merci de votre contribution! Veuillez consulter votre email.');
                    Session::flash('message', 'Successfully created user!');
                    $user = User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => bcrypt($data['password']),
                        'verification_code' => $confirmation_code,
                        'tel' => $data['tel'],
                        'cin' => $data['cin'],
                        'siga' => $data['code'],
                        'groupe' => $data['group'],
                        'ddn' => $data['ddn'],
                    ]);
                    $user->upload(Input::file('fichier'));
                return $user;
            }
        abort(503);
    }
}
