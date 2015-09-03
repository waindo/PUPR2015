@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
<h1>All the Groups</h1>
 <a class="btn btn-small btn-info" href="{{ URL::to('groups/create') }}">Add Data</a>
<!-- notifikasi messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 <br>
 <br>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID Group</td>
            <td>Group</td>                 
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($groups as $key => $value)
        <tr>
            <td>{{ $value->groupxgroupid }}</td>
            <td>{{ $value->groupxgroupxx }}</td>                
 
            <td>
                {{ Form::open(array('url' => 'groups/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
 
                <!-- show band GET /bands/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('groups/' . $value->id) }}">Show</a> -->
 
                <!-- edit band GET /bands/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('groups/' . $value->id . '/edit') }}">Edit</a>
 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop