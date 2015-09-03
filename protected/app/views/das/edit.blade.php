@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Edit {{ $das->nama }}</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($das, array('route' => array('das.update', $das->id), 'method' => 'PUT')) }}
 
 	 <div class="form-group">
        {{ Form::label('dasxxxkodewsx', 'Kode WS') }}
        {{ Form::text('dasxxxkodewsx', null, array('class' => 'form-control' , 'style'=>'width: 300px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('dasxxxnamadas', 'Kode DAS') }}
        {{ Form::text('dasxxxnamadas', null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>

    <div class="form-group">
        {{ Form::label('dasxxxkodedas', 'Kode DAS') }}
        {{ Form::text('dasxxxkodedas', null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
  	<div class="form-group">
        {{ Form::label('dasxxxnamadas', 'Nama DAS') }}
        {{ Form::text('dasxxxnamadas', null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
    {{ Form::submit('Edit the Das!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop