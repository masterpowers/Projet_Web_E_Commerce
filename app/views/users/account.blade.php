@extends('layouts.user')

@section('content')
<div class="col-md-8 col-md-offset-2">
  <div class="well">
    <div class="row">
      <div class="well article-complet">

        @foreach($user as $v)
        <a href="{{ URL::to('users/'.$v->id.'/edit') }}" style="float:right;" class="btn btn-primary glyphicon glyphicon-wrench"></a>
        <a href="{{ URL::to('users/'.$v->id.'/delete') }}" class="btn btn-primary glyphicon glyphicon-trash" onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?');"></a>
        <div class="article-header">
          <h1>{{ $v->username }}</h1>
          <hr>
        </div>
        <div class="contenu">
          {{ $v->email }}
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<script>
// var threadid = $('#threadid').text();
// $( "#tdid" ).html(function() {
// return '<span class="fa fa-eye threadbtn showthread" onclick="location.href=\' ' + threadid + '\'"></span>&nbsp';
// });
</script>
@stop
