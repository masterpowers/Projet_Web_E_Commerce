<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'users';
    protected $fillable = ['password', 'username', 'confirmed'];

    /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $hidden = array('password', 'remember_token');

    public static $rules = array(
        'username'=>'required|min:2|alpha',
        'email'=>'required|email|unique:users',
        'firstname'=>'required|min:2|alpha',
        'lastname'=>'required|min:2|alpha',
        'password'=>'required|min:2|alpha',
        'city'=>'required|min:2|alpha',
        'state'=>'required|min:2|alpha',
        'country'=>'required|min:2|alpha',
        'postal_code'=>'required',
        'phone'=>'required',
        'address1'=>'required'
    );


}
