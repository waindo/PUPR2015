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
        {{ Form::label('kodedas', 'Kode DAS') }}
        {{ Form::text('kodedas', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('namadas', 'Nama DAS') }}
        {{ Form::text('namadas', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('kodesungai', 'Kode Sungai') }}
        {{ Form::text('kodesungai', null, array('class' => 'form-control')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('namasungai', 'Nama Sungai') }}
        {{ Form::text('namasungai', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Sungai!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop