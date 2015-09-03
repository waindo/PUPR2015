@extends('layouts.mastermenu')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Edit {{ $menu->name }}</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($menu, array('route' => array('menus.update', $menu->id), 'method' => 'PUT')) }}
 
    <div class="form-group">
        {{ Form::label('id_menu', 'ID Menu') }}
        {{ Form::text('id_menu', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('menu', 'Menu') }}
        {{ Form::text('menu', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('url', 'url') }}
         {{ Form::text('url', null, array('class' => 'form-control')) }}
    </div>
 
    {{ Form::submit('Edit the Menu!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop