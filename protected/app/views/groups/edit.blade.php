@extends('layouts.mastergroup')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Edit {{ $group->name }}</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($group, array('route' => array('groups.update', $group->id), 'method' => 'PUT')) }}
 
    <div class="form-group">
        {{ Form::label('id_group', 'ID Group') }}
        {{ Form::text('id_group', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('group', 'Group') }}
        {{ Form::text('group', null, array('class' => 'form-control')) }}
    </div>
     
 
    {{ Form::submit('Edit the Group!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop