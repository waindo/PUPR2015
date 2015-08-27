@extends('layouts.layouthome')
 
 
@section('contenthome')

<h4>Tampil Data DAS (Daerah Aliran Sungai)</h4> 
<a class="btn btn-small btn-info" href="{{ URL::to('das/create') }}">Add Data</a>
<!-- notifikasi messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<br>
<br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Kode WS</td>            
            <td>Nama WS</td>            
            <td>Kode DAS</td>            
            <td>Nama DAS</td>                            
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($das as $key => $value)
        <tr>
            <td>{{ $value->dasxxxkodewsx }}</td>
            <td>{{ $value->dasxxxkodewsx }}</td> 
            <td>{{ $value->dasxxxkodedas }}</td>
            <td>{{ $value->dasxxxnamadas }}</td>                    
 
            <td>
                {{ Form::open(array('url' => 'das/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
 
                <!-- show band GET /bands/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('das/' . $value->id) }}">Detail</a> -->
 
                <!-- edit band GET /bands/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('das/' . $value->id . '/edit') }}">Edit</a>
 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop