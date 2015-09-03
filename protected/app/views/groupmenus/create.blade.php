@extends('layouts.mastergroupmenu')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Create a Group</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::open(array('url' => 'groupmenus')) }}
 
    <div class="form-group">
        {{ Form::label('id_group', 'ID Group') }}
        {{ Form::text('id_group', Input::old('id_group'), array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('id_menu', 'ID Menu') }}
        {{ Form::text('id_menu', Input::old('id_menu'), array('class' => 'form-control')) }}
    </div>
    
 
    {{ Form::submit('Create the Groupmenu !', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop