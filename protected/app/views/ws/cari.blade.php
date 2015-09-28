@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Sungai terdaftar --}}
	@if(count($cari))
		{{ Form::open(array('route' => 'cari-sungai', 'style' => 'padding-left:40px;padding-bottom:10px')) }}
			{{ Form::label('cari', 'Cari') }}
			{{ Form::text('cari', null, array('placeholder' => 'Cari yang lain...', 'style' => 'width:200px')) }}
			<small><i>*Tekan Enter</i></small>
		{{ Form::close() }}	
		<table id="data">			
			<th style="width:200px">Kode Das</th>
			<th style="width:350px">Kode Sungai</th>
			<th style="width:350px">Nama Sungai</th>			
			<th style="width:350px">Aksi</th>				
			@foreach($cari as $temp)
				<tr>					
					<td>{{ $temp->sungaikodedas }}</td>
					<td>{{ $temp->sungaikodesng }}</td>
					<td>{{ $temp->sungainamasng }}</td>
					<td><small>{{ link_to_route('ubah', 'Ubah', $temp->id) }} | {{ link_to_route('hapus', 'Hapus', $temp->id) }}</small></td>
				</tr>
			@endforeach
		</table>
		<!-- <p style="padding-left:30px">
			{{ Form::submit('Hapus Ceklis', array('class' => 'tombol')) }} 
			<small>*Ceklis data terlebih dahulu.</small>
		</p>
		 -->

	{{-- Bila Sungai tidak ada --}}
	@else
		<h3 id="tengah">
			Maaf, kata yang Anda maksud tidak ditemukan. <br/><br/>
			<a href="{{ route('beranda') }}" class="tombol">Kembali</a>
		</h3>
		<br/>
		@if(count($daftar))
		<p id="tengah">Atau mungkin yang Anda maksud adalah ini :</p>
		<table id="data">			
			<th style="width:200px">Kode Das</th>
			<th style="width:350px">Kode Sungai</th>
			<th style="width:350px">Nama Sungai</th>			
			@foreach($daftar as $temp)
				<tr>					
					<td>{{ $temp->sungaikodedas }}</td>
					<td>{{ $temp->sungaikodesng }}</td>
					<td>{{ $temp->sungainamasng }}</td>					
				</tr>
			@endforeach
		</table>
		@endif
	@endif
@stop