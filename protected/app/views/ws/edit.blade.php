@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Edit {{ $sungai->nama }}</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($sungai, array('route' => array('sungais.update', $sungai->id), 'method' => 'PUT')) }}
 
    <div class="form-group">
        {{ Form::label('Kodefikasi', 'Kodefikasi') }}
        {{ Form::text('kodefikasi', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('nama', 'Nama') }}
        {{ Form::text('nama', null, array('class' => 'form-control')) }}
    </div>
 
 
    {{ Form::submit('Edit the Sungai!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop