@extends('layouts.mastergroupmenu')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Edit {{ $groupmenu->name }}</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($groupmenu, array('route' => array('groupmenus.update', $groupmenu->id), 'method' => 'PUT')) }}
 
    <div class="form-group">
        {{ Form::label('id_group', 'ID Group') }}
        {{ Form::text('id_group', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('id_menu', 'ID Menu') }}
        {{ Form::text('id_menu', null, array('class' => 'form-control')) }}
    </div>
     
 
    {{ Form::submit('Edit the Group Menu!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop