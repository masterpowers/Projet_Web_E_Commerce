@extends('layouts.default')
@section('content')

<div class="form">
    <h2>S'inscrire</h2>
    {{Form::open(array('url'=>'users'))}}
    
    {{Form::label('username','Pseudo')}}
    {{Form::text('username', null, array('class'=>'form-control','placeholder'=>'Pseudo'))}}    
    
    {{Form::label('email','Email')}}
    {{Form::email('email', null, array('class'=>'form-control','placeholder'=>'Email'))}}

    {{Form::label('password','Mot de passe')}}
    {{Form::password('password', array('class'=>'form-control','placeholder'=>'Mot de passe'))}}
    
    {{Form::label('firstname','Prénom')}}
    {{Form::text('firstname', null, array('class'=>'form-control','placeholder'=>'Prénom'))}}

    {{Form::label('lastname','Nom')}}
    {{Form::text('lastname', null, array('class'=>'form-control','placeholder'=>'Nom'))}}

    {{Form::label('city','Ville')}}
    {{Form::text('city', null, array('class'=>'form-control','placeholder'=>'Ville'))}}

    {{Form::label('state','Région')}}
    {{Form::text('state', null, array('class'=>'form-control','placeholder'=>'Région'))}}

    {{Form::label('country','Pays')}}
    {{Form::text('country', null, array('class'=>'form-control','placeholder'=>'Pays'))}}

    {{Form::label('postal_code','Code postal')}}
    {{Form::text('postal_code', null, array('class'=>'form-control','placeholder'=>'Code postal'))}}

    {{Form::label('phone','Téléphone')}}
    {{Form::text('phone', null, array('class'=>'form-control','placeholder'=>'Téléphone'))}}

    {{Form::label('adress1','Adresse')}}
    {{Form::text('adress1', null, array('class'=>'form-control','placeholder'=>'Adresse'))}}

    {{Form::label('adress2','Adresse secondaire')}}
    {{Form::text('adress2', null, array('class'=>'form-control','placeholder'=>'Adresse secondaire'))}}
    
    <div class="submit">
        {{Form::submit("S'inscire", array('class'=>"btn btn-primary"))}}
    </div>

    <div class="clearfix"></div>
    {{Form::close()}}
</div>
@stop
