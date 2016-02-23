<?php

/**
* UserController
*
* Create Registragtion and Login Page
*
*/

class UserController extends BaseController
{
	/**
	*getCreate
	*
	*@return Registration Page
	*/
	public function getCreate()
	{
		return View::make('pages.user.register');
	}

	/**
	*getLogin
	*
	*@return Login Page
	*/
	public function getLogin()
	{
		return View::make('pages.user.login');
	}


	/**
	*getLogout
	*
	*log user out
	*
	*@return welcome Page
	*/
	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('welcome');
	}


	/**
	*getActivate
	*
	*if user click on email link he will be activated here
	*
	*
	* @param string $code authentication code different for evry user
	*  
	*@return welcome Page
	*/
	public function getActivate($code){
		$user = User::where('activation_code', '=', $code)->where('confirmed', '=', 0);

		if($user->count())
		{
			$user = $user->first();

			$user->confirmed = 1;
			$user->activation_code = '';

			if($user->save())
			{
				return Redirect::route('welcome')->with('success', 'Activated! You can now sign in');
			}
		}

		return Redirect::route('welcome')->with('fail', 'We cant activate your account');
	}

	/**
	*postCreate
	*
	* Creates user from Registration page
	* 
	* Validate Registration Page
	* save user if success send activation email to user
	* 			else try again
	* 
	*@return findYstone Page
	*/
	public function postCreate()
	{
		$validate = Validator::make(Input::all(), array(
				'email' => 'required',
				'username' => 'required|unique:users|min:4',
				'password' => 'required|min:6',
				'confpassword' => 'required|same:password',
			));

		if($validate->fails())
		{
			return Redirect::route('getCreate')->withErrors($validate)->withInput();
		}
		else
		{
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');

			$code = str_random(60);

			$user = new User();
			$user->email = $email;
			$user->username = $username;
			$user->password =Hash::make($password);
			$user->activation_code = $code;
			$user->confirmed = 0;

			if($user->save())
			{
				Mail::send('emails.welcome', array('link' => URL::route('getActivate', $code), 'username' => $username), function($message) use ($user){
					$message->to($user->email, $user->username)->subject('Activate your Mineralienstubeaccount');
				});

				return Redirect::route('findYstone')->with('success', 'Erfolgreich angemeldet');
			}
			else
			{
				return Redirect::route('findYstone')->with('fail', 'Ein fehler ist aufgetreten. Bitte erneut versuchen');
			}
		}
	}

	/**
	*postLogin
	*
	* Login user from Login page
	* 
	* Validate Login Page
	* 
	* 
	*@return home if sucess else login Page
	*/
	public function postLogin()
	{
		$validate = Validator::make(Input::all(), array(
				'username' => 'required',
				'password' => 'required',
			));

		if($validate->fails())
		{
			return Redirect::route('getLogin')->withErrors($validate)->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
				'confirmed' => 1,
			), $remember);

			if($auth)
			{
				return Redirect::intended(route('home'))->with('success', 'Welcome! You are now logged in');
			}
			else
			{
				return Redirect::route('getLogin')->with('fail', 'Sie konnten nicht angemeldet werden. Bitte Accoutn registrieren oder aktiviert?');
			}
		}

	}
}