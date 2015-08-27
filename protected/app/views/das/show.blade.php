@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Showing {{ $das->dasxxxnamadas }}</h1>
 
    <div class="jumbotron text-center">
        <h2>{{ $das->nama }}</h2>
        <p>
            <strong>Kode WS  :</strong> {{ $das->dasxxxkodewsx }}<br>
            <strong>Nama WS :</strong> {{ $das->dasxxxnamadas }}<br>
            <strong>Kode DAS  :</strong> {{ $das->dasxxxkodewsx }}<br>
            <strong>Nama DAS :</strong> {{ $das->dasxxxnamadas }}
        </p>
    </div>
 
@stop