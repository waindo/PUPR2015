@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
<h1>All the Group Menus</h1>
 
<!-- notifikasi messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID Group</td>
            <td>ID Menu</td>                 
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($groupmenus as $key => $value)
        <tr>
            <td>{{ $value->id_group }}</td>
            <td>{{ $value->id_menu }}</td>                
 
            <td>
                {{ Form::open(array('url' => 'groupmenus/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
 
                <!-- show band GET /bands/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('groupmenus/' . $value->id) }}">Show</a>
 
                <!-- edit band GET /bands/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('groupmenus/' . $value->id . '/edit') }}">Edit</a>
 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop