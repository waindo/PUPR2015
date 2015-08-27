@extends('layouts.layouthome')
 
 
@section('contenthome')

<h4>Tampil Data Sungai</h4> 
<a class="btn btn-small btn-info" href="{{ URL::to('sungais/create') }}">Add Data</a>
<!-- notifikasi messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<br>
<br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>           
            <td>Kode DAS</td>            
            <td>Nama DAS</td>            
            <td>Kode Sungai</td>            
            <td>Nama Sungai</td>                                                    
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($sungais as $key => $value)
        <tr>
            <td>{{ $value->dasxxxkodedas }}</td>
            <td>{{ $value->dasxxxnamadas }}</td> 
            <td>{{ $value->sungaikodesng }}</td>
            <td>{{ $value->sungainamasng }}</td>             
                             
 
            <td>
                {{ Form::open(array('url' => 'sungais/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
 
                <!-- show band GET /bands/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('sungais/' . $value->id) }}">Detail</a> -->
 
                <!-- edit band GET /bands/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('sungais/' . $value->id . '/edit') }}">Edit</a>
 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop