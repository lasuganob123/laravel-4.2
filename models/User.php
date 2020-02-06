<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'user_type',
		'password'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = [
		'firstname' => 'required|min:2',
		'lastname' => 'required|min:2',
        'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
		'password' => 'required|between:6,50|alpha_num|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,50'
	];

	protected $dates = ['deleted_at'];
	
	public function blog()
    {
        return $this->hasMany('Blog');
	}
	public function isAdmin() {
		if($this->user_type == 'admin') {
			return true;
		}
	}

}