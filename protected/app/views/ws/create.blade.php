@extends('layouts.layouthome')

@section('sidebar-nav')
 
@stop
 
@section('contenthome')
 
<h4>Create a Wilayah Sungai</h4>
 
<!-- notifikasi error -->
{{ HTML::ul($errors->all()) }}
 
{{ Form::open(array('url' => 'wsdtl')) }}

    <div class="form-group">
        {{ Form::label('kodews', 'Kode WS') }}
        {{ Form::text('wlsdtlkodewsx', Input::old('wlsdtlkodewsx'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
 	<div class="form-group">
	    {{Form::label('usersxlevelxx', 'Pulau') }} 
	    {{Form::select('usersxlevelxx', array('0' => 'Pulau Sumatra', '1' => 'Pulau Jawa', '2' => 'Pulau Bali dan Kep. Nusa Tenggara' , '3' => 'Pulau Kalimantan', '4' => 'Pulau Selawesi', '5' => 'Pulau Maluku', '6' => 'Pulau Papua'), Input::old('usersxlevelxx'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>
 
 	<div class="form-group">
        {{ Form::label('nama', 'Nama') }}
        {{ Form::text('nama', Input::old('nama'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>

    <div class="form-group">
	    {{Form::label('kategori', 'Kategori') }} 
	    {{Form::select('kategori', array('0' => 'WS Lintas Negara', '1' => 'WS Lintas Provinsi', '2' => 'WS Strategis Nasional'), Input::old('usersxlevelxx'), array('class' => 'form-control', 'style'=>'width: 300px')) }}
    </div>

    <hr width="100%">

    <div class="form-group">
        {{Form::label('provinsi', 'Provinsi') }} 
        {{Form::select('wlsdtlkodprov', $propinsi, null, array('id' => 'sPropinsi', 'class' => 'form-control', 'style'=>'width: 200px'))  }}
   </div>
     <br>
     <a class="btn btn-primary" href="{{ URL::to('wsdtl/tambah') }}">Tambah</a>
      
     <br>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
           <!--  <td>No</td> -->
            <td>Provinsi</td>                                         
            <td>Actions</td>
        </tr>
    </thead>
     @foreach($wsdtl as $key => $value)
        <tr>
            <!-- <td>{{ $value->id }}</td> -->
            <td>{{ $value->provxxnamprov }}</td>         
                   
 
            <td>
               <!--  {{ Form::open(array('url' => 'ws/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
  -->
                <!-- show band GET /bands/{id} -->
               <!-- <a class="btn btn-primary" href="{{ URL::to('wsdtl/' . $value->id) }}">Delete</a> -->
                <a class="btn btn-primary" href="{{ URL::to('wsdtl/destroy/'.$value->id) }}">Delete</a>
                <!-- edit band GET /bands/{id}/edit -->
                <!-- <a class="btn btn-small btn-info" href="{{ URL::to('ws/' . $value->id . '/edit') }}">Edit</a> -->
 
            </td>
        </tr>
    @endforeach

    
    </tbody>
    </table>

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

    <a class="btn btn-primary" href="{{ URL::to('das') }}">DAS</a>
    <a class="btn btn-primary" href="{{ URL::to('sungais') }}">Sungai</a>
 
 
{{ Form::close() }}
 
@stop