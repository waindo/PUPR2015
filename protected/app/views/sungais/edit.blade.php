@extends('layouts.layouthome')
 
@section('navbar')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Edit {{ $sungai->sungaikodesng }}</h1>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::model($sungai, array('route' => array('sungais.update', $sungai->id), 'method' => 'PUT')) }}
 
    <div class="form-group">
        {{ Form::label('kodedas', 'Kode Das') }}
        {{ Form::text('sungaikodedas', null, array('class' => 'form-control' , 'style'=>'width: 200px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('kodesungai', 'Kode Sungai') }}
        {{ Form::text('sungaikodesng', null, array('class' => 'form-control' , 'style'=>'width: 200px')) }}
    </div>
     
 
    {{ Form::submit('Edit the Sungai!', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop