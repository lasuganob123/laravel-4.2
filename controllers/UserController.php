<?php

class UserController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		// $this->beforeFilter('auth', array('only'=>array(
		// 	'index',
		// 	'create',
		// 	'show',
		// 	'edit'
		// )));
	}

	public function index() {
		$users = User::latest()->get();

		return View::make('users.users', array('users' => $users));
	}
	public function create() {
		$messages = '';

		return View::make('users.create',array('validator'=>$messages));
	}

	public function store() {

		$validator = Validator::make(Input::all(),User::$rules);

        if ($validator->passes()) {
            $user = new User;
            $user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
            $user->save();
            return Redirect::to('users')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::to('users/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
	
	}

	public function show($id)
	{
		$user = User::find($id);

		return View::make('users.show',array('user'=>$user));
	}

	public function edit($id)
	{
		$user = User::findOrFail($id);

    	return View::make('users.edit')->withUser($user);
	}

	public function update($id)
	{
		$validator = Validator::make(Input::all(),User::$rules);

        if ($validator->passes()) {
            $user = User::findOrFail($id);
			$user->fill(Request::all())
					->save();

			return Redirect::to('users')
				->with('message', 'Updated!');
        } else {
			return Redirect::to('users/'.$id.'/edit')
				->with('message', 'The following errors occurred')
				->withErrors($validator)->withInput();
        }
	}

	public function destroy($id)
	{
		$user = User::findOrFail($id);

		$user->delete();

		return Redirect::to('users')->with('message', 'Successfully deleted!');
	}

}
