@extends('layouts.layouthome')
 
 
@section('contenthome')

<h4>Tampil Data Wilayah Sungai</h4> 
<a class="btn btn-small btn-info" href="{{ URL::to('ws/create') }}">Add Data</a>
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
            <td>Kode</td>            
            <td>Pulau</td>            
            <td>Kategori</td>            
            <td>DAS</td>            
            <td>Sungai</td>                                
           <!--  <td>Actions</td> -->
        </tr>
    </thead>
    <tbody>
    @foreach($ws as $key => $value)
        <tr>
            <td>{{ $value->wilsngkodewsx }}</td>
            <td>{{ $value->wilsngkodewsx }}</td> 
            <td>{{ $value->wilsngkodewsx }}</td>
            <td>{{ $value->wilsngkodewsx }}</td> 
            <td>{{ $value->dasxxxnamadas }}</td>
            <td>{{ $value->sungainamasng }}</td>                    
 
           <!--  <td>
                {{ Form::open(array('url' => 'ws/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
 
                show band GET /bands/{id}
               <a class="btn btn-small btn-success" href="{{ URL::to('ws/' . $value->id) }}">Show</a> -->
 
                <!-- edit band GET /bands/{id}/edit -->
                <!-- <a class="btn btn-small btn-info" href="{{ URL::to('ws/' . $value->id . '/edit') }}">Edit</a>
 
            </td>  -->
        </tr>
    @endforeach
    </tbody>
</table>
@stop