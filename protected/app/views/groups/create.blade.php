@extends('layouts.mastergroup')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Create a Group</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::open(array('url' => 'groups')) }}
 
    <div class="form-group">
        {{ Form::label('id_group', 'ID Group') }}
        {{ Form::text('id_group', Input::old('id_group'), array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('group', 'Group') }}
        {{ Form::text('group', Input::old('group'), array('class' => 'form-control')) }}
    </div>
    
 
    {{ Form::submit('Create the Group !', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop