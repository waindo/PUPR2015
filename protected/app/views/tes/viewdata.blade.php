<?
@extends('_layouts.layouthome')
@section('contenthome')

<h3>Detail Codes</h3>

<section class="container">
<br>
 <table class="table">
	<tr>
	   <th>Head</th>
	   <td>{{ $codes->codesxheadxxx }}</td>
	</tr>
	<tr>
	   <th>Code</th>
	   <td>{{ $codes->codesxcodexxx }}</td>
	</tr>
	<tr>
	   <th>Desc 1</th>
	   <td>{{ $codes->codesxdesc1xx }}</td>
	</tr>
	<tr>
	   <th>Desc 2</th>
	   <td>{{ $codes->codesxdesc2xx }}</td>
	</tr>
	<tr>
	   <th>Status</th>
	   <td>{{ $codes->codesxstatusx }}</td>
	</tr>
	<tr>
 </table>
 <a href="{{ URL::previous() }}"><b>Kembali</b></a>
 <br>
 <br>
 </section>

@stop
?>
