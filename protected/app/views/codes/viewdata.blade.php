<?
@extends('_layouts.layouthome')
@section('contenthome')

<h3>Detail Codes</h3>

<section class="container">
<br>
 <table class="table">
	<tr>
	   <th>Head</th>
	   <td>{{ $daftar->codesxheadxxx }}</td>
	</tr>
	<tr>
	   <th>Code</th>
	   <td>{{ $daftar->codesxcodexxx }}</td>
	</tr>
	<tr>
	   <th>Desc 1</th>
	   <td>{{ $daftar->codesxdesc1xx }}</td>
	</tr>
	<tr>
	   <th>Desc 2</th>
	   <td>{{ $daftar->codesxdesc2xx }}</td>
	</tr>
	<tr>
	   <th>Status</th>
	   <td>{{ $daftar->codesxstatusx }}</td>
	</tr>
	<tr>
 </table>
 <a href="{{ URL::previous() }}"><b>Kembali</b></a>
 <br>
 <br>
 </section>

@stop
?>
