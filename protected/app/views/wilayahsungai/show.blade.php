@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Showing {{ $sungai->nama }}</h1>
 
    <div class="jumbotron text-center">
        <h2>{{ $sungai->nama }}</h2>
        <p>
            <strong>Kodefikasi  :</strong> {{ $sungai->kodefikasi }}<br>
            <strong>Nama Sungai :</strong> {{ $sungai->nama }}
        </p>
    </div>
 
@stop