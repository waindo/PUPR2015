@extends('layouts.mastermenu')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Create a Menu</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::open(array('url' => 'menus')) }}
 
    <div class="form-group">
        {{ Form::label('id_menu', 'ID Menu') }}
        {{ Form::text('id_menu', Input::old('id_menu'), array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('menu', 'Menu') }}
        {{ Form::text('menu', Input::old('menu'), array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('url', 'Url') }}
        {{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}
    </div>
 
    {{ Form::submit('Create the Menu !', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop