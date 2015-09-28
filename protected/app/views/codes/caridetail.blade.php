@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Group terdaftar --}}
	@if(count($cari))
		{{ Form::open(array('route' => 'cari-codesdetail', 'style' => 'padding-left:40px;padding-bottom:10px')) }}
			{{ Form::label('cari', 'Cari') }}
			{{ Form::text('cari', null, array('placeholder' => 'Cari yang lain...', 'style' => 'width:200px')) }}
			<small><i>*Tekan Enter</i></small>
		{{ Form::close() }}	
		<table id="data">			
			<th style="width:200px">Desc 1</th>
			<th style="width:350px">Desc 2</th>					
			<th style="width:350px">Aksi</th>				
			@foreach($cari as $temp)
				<tr>						
					<td>{{ $temp->codesxdesc1xx }}</td>
					<td>{{ $temp->codesxdesc2xx }}</td>							
			
					<td><small>{{ link_to_route('ubahcodesdetail', 'Ubah', $temp->id) }} | {{ link_to_route('hapusdetail', 'Hapus', $temp->codesxheadxxx) }} </small></td>
				</tr>
			@endforeach
		</table>

	{{-- Bila Code tidak ada --}}
	@else
		<h3 id="tengah">
			Maaf, kata yang Anda maksud tidak ditemukan. <br/><br/>
			<a href="{{ route('berandacodes') }}" class="tombol">Kembali</a>
		</h3>
		<br/>
		@if(count($daftar))
		<p id="tengah">Atau mungkin yang Anda maksud adalah ini :</p>
		<table id="data">			
			<th style="width:200px">Desc 1</th>
			<th style="width:350px">Desc 2</th>									
			@foreach($daftar as $temp)
				<tr>					
					<td>{{ $temp->codesxdesc1xx }}</td>
					<td>{{ $temp->codesxdesc2xx }}</td>							
				</tr>
			@endforeach
		</table>
		@endif
	@endif
@stop