<?php
class PagesController extends \BaseController {

	public function index() {
		return View::make('hello');
	}

	public function about() {
		return View::make('pages.about');
  	}

	public function login() {
		if(Auth::check()) return Redirect::to('users')->with('message','You\'re currently logged in.');

		return View::make('pages.login');
	}

	public function register() {

		if(Auth::check()) return Redirect::to('users')->with('message','You\'re currently logged in.');

		$messages = '';
		
		return View::make('pages.register',array('validator'=>$messages));
	}

	public function postCreate() {

		$validator = Validator::make(Input::all(),User::$rules);

        if ($validator->passes()) {
            $user = new User;
            $user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
            $user->save();
            return Redirect::to('login')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
	}
	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {

			return Redirect::to('users')->with('message', 'You are now logged in!');
		} else {
			return Redirect::back()
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}   
	}
	public function getLogout() {
		Auth::logout();
		return Redirect::to('login')->with('message', 'Your are now logged out!');
	}
}
