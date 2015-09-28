@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Das terdaftar --}}
	@if(count($cari))
		{{ Form::open(array('route' => 'cari-das', 'style' => 'padding-left:40px;padding-bottom:10px')) }}
			{{ Form::label('cari', 'Cari') }}
			{{ Form::text('cari', null, array('placeholder' => 'Cari yang lain...', 'style' => 'width:200px')) }}
			<small><i>*Tekan Enter</i></small>
		{{ Form::close() }}	
		<table id="data">			
			<th style="width:200px">Kode WS</th>
			<th style="width:350px">Kode Das</th>
			<th style="width:350px">Nama Das</th>			
			<th style="width:350px">Aksi</th>				
			@foreach($cari as $temp)
				<tr>					
					<td>{{ $temp->dasxxxkodewsx }}</td>
					<td>{{ $temp->dasxxxkodedas }}</td>
					<td>{{ $temp->dasxxxnamadas }}</td>
					<td><small>{{ link_to_route('ubahdas', 'Ubah', $temp->id) }} | {{ link_to_route('hapusdas', 'Hapus', $temp->id) }}</small></td>
				</tr>
			@endforeach
		</table>
		<!-- <p style="padding-left:30px">
			{{ Form::submit('Hapus Ceklis', array('class' => 'tombol')) }} 
			<small>*Ceklis data terlebih dahulu.</small>
		</p>
		 -->

	{{-- Bila Das tidak ada --}}
	@else
		<h3 id="tengah">
			Maaf, kata yang Anda maksud tidak ditemukan. <br/><br/>
			<a href="{{ route('berandadas') }}" class="tombol">Kembali</a>
		</h3>
		<br/>
		@if(count($daftar))
		<p id="tengah">Atau mungkin yang Anda maksud adalah ini :</p>
		<table id="data">			
			<th style="width:200px">Kode Ws</th>
			<th style="width:350px">Kode Das</th>
			<th style="width:350px">Nama Das</th>			
			@foreach($daftar as $temp)
				<tr>					
					<td>{{ $temp->dasxxxkodewsx }}</td>
					<td>{{ $temp->dasxxxkodedas }}</td>
					<td>{{ $temp->dasxxxnamadas }}</td>			
				</tr>
			@endforeach
		</table>
		@endif
	@endif
@stop