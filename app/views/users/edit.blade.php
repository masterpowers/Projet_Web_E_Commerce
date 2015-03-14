@extends('layouts.user')
@section('content')
<div class="form">
  <h2>Modifier son profil</h2>
  {{Form::open(array('url' => 'users/'.Auth::user()->id, "method" => "put"))}}

  {{Form::label('username','Pseudo')}}
  {{Form::text('username', Auth::user()->username,array('class'=>'form-control','placeholder'=>'Pseudo'))}}

  {{Form::label('email','Email')}}
  {{Form::email('email', Auth::user()->email, array('class'=>'form-control','placeholder'=>'Email'))}}

  {{Form::label('password','Mot de passe')}}
  {{Form::password('password', array('class'=>'form-control','placeholder'=>'Mot de passe'))}}

  {{Form::label('firstname','Prénom')}}
  {{Form::text('firstname',Auth::user()->firstname, array('class'=>'form-control','placeholder'=>'Prénom'))}}

  {{Form::label('lastname','Nom')}}
  {{Form::text('lastname', Auth::user()->lastname, array('class'=>'form-control','placeholder'=>'Nom'))}}

  {{Form::label('city','Ville')}}
  {{Form::text('city', Auth::user()->city, array('class'=>'form-control','placeholder'=>'Ville'))}}

  {{Form::label('state','Région')}}
  {{Form::text('state', Auth::user()->state, array('class'=>'form-control','placeholder'=>'Région'))}}

  {{Form::label('country','Pays')}}
  {{Form::text('country', Auth::user()->country, array('class'=>'form-control','placeholder'=>'Pays'))}}

  {{Form::label('postal_code','Code postal')}}
  {{Form::text('postal_code', Auth::user()->postal_code, array('class'=>'form-control','placeholder'=>'Code postal'))}}

  {{Form::label('phone','Téléphone')}}
  {{Form::text('phone', Auth::user()->phone, array('class'=>'form-control','placeholder'=>'Téléphone'))}}

  {{Form::label('adress1','Adresse')}}
  {{Form::text('adress1', Auth::user()->adress1, array('class'=>'form-control','placeholder'=>'Adresse'))}}

  {{Form::label('adress2','Adresse secondaire')}}
  {{Form::text('adress2', Auth::user()->adress2, array('class'=>'form-control','placeholder'=>'Adresse secondaire'))}}

  <div class="submit">
    {{Form::submit("Update", array('class'=>"btn btn-primary"))}}
  </div>

  <div class="clearfix"></div>
  {{Form::close()}}
</div>

@stop
