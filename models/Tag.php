<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Tag extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'tags';

	protected $fillable = [
		'name',
		'description',
    ];

    public static $rules = [
        'name' => 'required|min:2',
        'description' => 'required|min:10',
    ];
    
    public function user()
    {
        return $this->belongsTo('User');
    }   
    public function blogs()
    {
        return $this->belongsToMany('Blog');
    }
}