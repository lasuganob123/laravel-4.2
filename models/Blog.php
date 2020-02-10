<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Blog extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'blogs';

	protected $fillable = [
		'user_id',
		'slug',
        'title',
        'content'
    ];

    public static $addRules = [
        'title' => 'required|min:5',
		'slug' => 'required|min:5|unique:blogs|alpha_dash',
        'content' => 'required|min:20',
    ];

    public static $editRules = [
        'title' => 'required|min:5',
        'content' => 'required|min:20',
    ];
    
    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function IsAdminOrChiefEditor() {
        $currUser = Auth::user();
		if($currUser->user_type == 'admin' || $currUser->user_type == 'chief-editor') {
			return true;
        }
        
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag')->withTimestamps();
    }

    public function getTagListAttribute() 
    {
        return $this->tags->lists('id');
    }
}