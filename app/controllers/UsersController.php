<?php

class UsersController extends BaseController {

    /**
    * Display a listing of users
    *
    * @return Response
    */
    public function index()
    {
        $users = User::all();

        return View::make('users.index', compact('users'));
    }

    /**
    * Show the form for creating a new user
    *
    * @return Response
    */
    public function create()
    {
        return View::make('users.create');
    }

    /**
    * Store a newly created user in storage.
    *
    * @return Response
    */
    public function store()
    {
        /*		$validator = Validator::make(Input::all());
        if($validator->passes())*/
        //{
        $password = htmlentities(Input::get('password'));
        $password = Hash::make($password);
        $confirmed = 0;
        $role = 'User';

        $user = new User();
        $user->username = htmlentities(Input::get('username'));
        $user->email = htmlentities(Input::get('email'));
        $user->firstname = htmlentities(Input::get('firstname'));
        $user->lastname = htmlentities(Input::get('lastname'));
        $user->password = $password;
        $user->city = htmlentities(Input::get('city'));
        $user->state = htmlentities(Input::get('state'));
        $user->country = htmlentities(Input::get('country'));
        $user->postal_code = htmlentities(Input::get('postal_code'));
        $user->phone = htmlentities(Input::get('phone'));
        $user->adress1 = htmlentities(Input::get('adress1'));
        $user->adress2 = htmlentities(Input::get('adress2'));
        $user->role = $role;
        $confirmation_code = str_random(30);
        $user->confirmation_code = $confirmation_code;
        $user->save();
        Mail::send('users.mails.welcome' ,$user->toArray() , function($message){
            $message->to(Input::get('email'), Input::get('username').' '.Input::get('firstname'))->subject('Bienvenue sur Ecommerce');
        });
        return Redirect::to('users/login');

    }

    function confirm($confirmation_code)
    {
        if(!$confirmation_code){
            throw new Exception('Confirmation impossible ou non existante !');
        }
        $user = User::where('confirmation_code', $confirmation_code)->first();
        if (!$user){
            throw new Exception('Confirmation impossible ou non existante !');
        }
        $user->confirmed = 1;
        $user->confirmation_code = NULL;
        $user->save();
        return Redirect::to('users/login')
        ->with('message', 'Félicitation votre compte est activé !');
    }


    public function getLogin()
    {
        return View::make('users.login');
    }


    public function postLogin()
    {
        if (Auth::attempt(['username'=>Input::get('username'), 'password'=>Input::get('password')])) {
            if(Auth::user()->confirmed == 1){
                return Redirect::to('/')->with('message', 'LOGGED :) '.Auth::user()->username);
            }else{
                Auth::logout();
                return Redirect::to('users/login')
                    ->with('error', 'Your username/password combination was incorrect')
                    ->withInput();
            }
        }
    }

    public function getAdmin()
    {
        return View::make('layouts.admin');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('users/login');
    }

    public function getProfile()
    {
        return View::make('layouts.user');
    }

    public function show($id)
    {
        /*$user = User::findOrFail($id);

        return View::make('users.show', compact('user'));*/
    }

    /**
    * Show the form for editing the specified user.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return View::make('users.update')->with('user', $user);
    }

    /**
    * Update the specified user in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        $user = User::find($id);
        if (Input::get('username'))
        {
            $user->username = htmlentities(Input::get('username'));
        }

        if (Input::get('email'))
        {
            $user->email = htmlentities(Input::get('email'));
        }

        if (Input::get('firstname'))
        {
            $user->firstname = htmlentities(Input::get('firstname'));
        }

        if (Input::get('lastname'))
        {
            $user->lastname = htmlentities(Input::get('lastname'));
        }

        if (Input::get('password'))
        {
            $user->password = htmlentities(Input::get('password'));
        }

        if (Input::get('city'))
        {
            $user->city = htmlentities(Input::get('city'));
        }

        if (Input::get('state'))
        {
            $user->state = htmlentities(Input::get('state'));
        }

        if (Input::get('country'))
        {
            $user->country = htmlentities(Input::get('country'));
        }

        if (Input::get('postal_code'))
        {
            $user->postal_code = htmlentities(Input::get('postal_code'));
        }

        if (Input::get('phone'))
        {
            $user->phone = htmlentities(Input::get('phone'));
        }

        if (Input::get('adress1'))
        {
            $user->adress1 = htmlentities(Input::get('adress1'));
        }

        if (Input::get('adress2'))
        {
            $user->adress2 = htmlentities(Input::get('adress2'));
        }

        $user->save();
        return Redirect::to('users/profile');

        /*else
        {
        return Redirect::to('users/'.Auth::user()->id.'/edit')
        ->with('error','Vous devez remplir tous les champs!');
    }*/
}

/**
* Remove the specified user from storage.
*
* @param  int  $id
* @return Response
*/
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return Redirect::to('/');
}
}
