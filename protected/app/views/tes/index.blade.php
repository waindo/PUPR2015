@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Codes terdaftar --}}
	@if(count($daftar))	



	<a href="{{ route('buatcodesdetail') }}" id="baru" class="tombol">Tambah Data</a>
		      

		{{ Form::open(array('route' => 'cari-codes', 'style' => 'padding-left:40px;padding-bottom:10px')) }}
			{{ Form::label('cari', 'Cari') }}
			{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px')) }}
			<small><i>*Tekan Enter</i></small>
		{{ Form::close() }}	
		
		<table id="data">			
			<th style="width:200px"><a href="{{ route('tampildet', 'codesxdesc1xx') }}">Desc 1</a></th>
			<th style="width:350px"><a href="{{ route('tampildet', 'codesxdesc2xx') }}">Desc 2</a></th>							
			<th style="width:200px">Aksi</th>
				
			@foreach($daftar as $temp)
				<tr>						
					<td>{{ $temp->codesxdesc1xx }}</td>
					<td>{{ $temp->codesxdesc2xx }}</td>							

					<td><small>{{ link_to_route('tampildet', 'Ubah', array($temp->codesxdesc1xx, $temp->codesxdesc2xx) ) }} | <a href="{{ route('tampildet', $temp->codesxheadxxx&$temp->codesxdesc2xx) }}">Detail</a></td>
				</tr>
			@endforeach
		</table>
		<!-- <p style="padding-left:30px">
			{{ Form::submit('Hapus Ceklis', array('class' => 'tombol')) }} 
			<small>*Ceklis data terlebih dahulu.</small>
		</p> -->
		
	{{-- Bila codes tidak ada --}}
	@else
		<p id="tengah">Maaf, Anda belum memiliki data Codes. </p>
		<p id="tengah">{{ link_to_route('buatcodesdetail', 'Buat Baru') }}</p>
	@endif
@stop