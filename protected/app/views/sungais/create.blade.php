@extends('layouts.layouthome')

@section('sidebar-nav')
 
@stop
 
@section('contenthome')
 
<h4>Create a Sungai</h4>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::open(array('url' => 'sungais')) }}
    
    <div class="form-group">
        {{ Form::label('kodedas', 'Nama DAS') }}        
        {{ Form::select('kodedas', $das, null, array('class' => 'form-control', 'style'=>'width: 200px'))  }}
    </div>
 
   <!--  <div class="form-group">
        {{ Form::label('namadas', 'Nama DAS') }}
        {{ Form::text('namadas', Input::old('namadas'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div> -->
 
    <div class="form-group">
        {{ Form::label('kodesungai', 'Kode Sungai') }}
        {{ Form::text('kodesungai', Input::old('kodesungai'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
    <div class="form-group">
        {{ Form::label('namasungai', 'Nama Sungai') }}
        {{ Form::text('namasungai', Input::old('namasungai'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 

    {{ Form::submit('Create the Sungai !', array('class' => 'btn btn-primary')) }}
 
{{ Form::close() }}
 
@stop