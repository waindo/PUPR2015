@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Edit </h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($sungai, array('route' => array('sungais.update', $sungai->id), 'method' => 'PUT')) }}
 
 	<div class="form-group">
        {{ Form::label('sungaikodedas', 'Kode DAS') }}
        {{ Form::text('sungaikodedas', null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('sungainamasng', 'Nama DAS') }}
        {{ Form::text('sungainamasng', null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('sungaikodesng', 'Kode Sungai') }}
        {{ Form::text('sungaikodesng', null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('sungainamasng', 'Nama Sungai') }}
        {{ Form::text('sungainamasng', null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>

    {{ Form::submit('Edit the Sungai!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop