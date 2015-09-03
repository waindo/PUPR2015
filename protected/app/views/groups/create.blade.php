@extends('layouts.layouthome')
 
@section('navbar')
@parent
 
@stop
 
@section('contenthome')
 
<h4>Create a Group</h4>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::open(array('url' => 'groups')) }}
 
    <div class="form-group">
        {{ Form::label('id_group', 'ID Group') }}
        {{ Form::text('groupxgroupid', Input::old('groupxgroupid'), array('class' => 'form-control' , 'style'=>'width: 200px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('group', 'Group') }}
        {{ Form::text('groupxgroupxx', Input::old('groupxgroupxx'), array('class' => 'form-control' , 'style'=>'width: 200px')) }}
    </div>
    
 
    {{ Form::submit('Create the Group !', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop