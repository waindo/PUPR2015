@extends('layouts.layouthome')

@section('sidebar-nav')
 
@stop
 
@section('contenthome')
 
<h4>Create a DAS</h4>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::open(array('url' => 'das')) }}
    
    <div class="form-group">
        {{ Form::label('dasxxxkodewsx', 'Kode WS') }}
        {{ Form::select('dasxxxkodewsx', $ws,null, array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
  <!--   <div class="form-group">
        {{ Form::label('dasxxxnamadas', 'Nama WS') }}
        {{ Form::text('dasxxxkodedas', Input::old('dasxxxkodedas'), array('class' => 'form-control' , 'style'=>'width: 300px')) }}
    </div>
 -->
     <div class="form-group">
        {{ Form::label('dasxxxkodedas', 'Kode DAS') }}
        {{ Form::text('dasxxxkodedas', Input::old('dasxxxkodedas'), array('class' => 'form-control' , 'style'=>'width: 300px')) }}
    </div>
 
  	<div class="form-group">
        {{ Form::label('dasxxxnamadas', 'Nama DAS') }}
        {{ Form::text('dasxxxnamadas', Input::old('dasxxxnamadas'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>

    {{ Form::submit('Create the DAS !', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop