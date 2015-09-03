@extends('layouts.layouthome')
 
@section('navbar')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Edit {{ $group->name }}</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($group, array('route' => array('groups.update', $group->id), 'method' => 'PUT')) }}
 
    <div class="form-group">
        {{ Form::label('id_group', 'ID Group') }}
        {{ Form::text('groupxgroupid', null, array('class' => 'form-control' , 'style'=>'width: 200px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('group', 'Group') }}
        {{ Form::text('groupxgroupxx', null, array('class' => 'form-control' , 'style'=>'width: 200px')) }}
    </div>
     
 
    {{ Form::submit('Edit the Group!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop