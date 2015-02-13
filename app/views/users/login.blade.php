@extends('layouts.default')
@section('content')

<div class="form">
    <h2>Se connecter</h2>
    {{Form::open(array('url'=>'users/login'))}}
    
    {{Form::label('username','Pseudo')}}
    {{Form::text('username', null, array('class'=>'form-control','placeholder'=>'Pseudo'))}}    
    
    {{Form::label('password','Mot de passe')}}
    {{Form::password('password', array('class'=>'form-control','placeholder'=>'Mot de passe'))}}

	{{Form::submit("Se Connecter", array('class'=>"btn btn-primary"))}}
    <div class="clearfix"></div>
    {{Form::close()}}
</div>
@stop