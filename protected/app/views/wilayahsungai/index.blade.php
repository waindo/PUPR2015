@extends('layouts.layouthome')
 
 
@section('contenthome')

<h4>Tampil Data Wilayah Sungai</h4> 
<!-- <a class="btn btn-small btn-info" href="{{ URL::to('sungais/create') }}">Add Data</a> -->
<!-- notifikasi messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<br>
<br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>           
            <td>No</td>            
            <td>Pulau</td>            
            <td>Nama WS</td>            
            <td>Kategori</td>                                                    
            <td>DAS</td>                                                    
            <td>Sungai</td>                                                    
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($wilayahsungai as $key => $value)
        <tr>
            <td>{{ $value->sungaikodedas }}</td>
            <td>{{ $value->sungaikodedas }}</td> 
            <td>{{ $value->sungaikodesng }}</td>
            <td>{{ $value->sungaikodesng }}</td>  
            <td>{{ $value->sungaikodesng }}</td>
            <td>{{ $value->sungaikodesng }}</td>              
                             
 
            <td>
                <!-- {{ Form::open(array('url' => 'sungais/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete ', array('class' => 'btn btn-warning')) }}-->
                {{ Form::close() }}
 
                <!-- show band GET /bands/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('sungais/' . $value->id) }}">Show</a> -->
 
                <!-- edit band GET /bands/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('sungais/' . $value->id . '/edit') }}">Add New</a>
 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop