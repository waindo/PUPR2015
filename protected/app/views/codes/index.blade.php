@extends('_layouts.layouthome')
@section('contenthome')
<br>
	{{-- Bila Codes terdaftar --}}
	@if(count($daftar))
	<br>	
		<a href="{{ route('buatcodes') }}" id="baru" class="btn btn-small btn-info">Tambah Data</a>	
		<br>
		<br>

		{{ Form::open(array('route' => 'cari-codes', 'style' => 'padding-left:0px;padding-bottom:10px')) }}
		<table>
			<tr>
				<td width="50">{{ Form::label('cari', 'Cari   ') }}</td>  
				<td>{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px', 'class' => 'form-control',)) }}	</td>							
				<td><small><i>*Tekan Enter</i></small></td>
			</tr>
		</table>			
	    {{ Form::close() }}
		
		<table class="table table-striped table-bordered">			
			<th style="width:200px"><a href="{{ route('urut-codes', 'codesxdesc1xx') }}">Jenis (IND)</a></th>
			<th style="width:350px"><a href="{{ route('urut-codes', 'codesxdesc2xx') }}">Jenis (ENG)</a></th>
			<th style="width:350px">Aksi</th>
				
			@foreach($daftar as $temp)
				<tr>						
					<td>{{ $temp->codesxdesc1xx }}</td>
					<td>{{ $temp->codesxdesc2xx }}</td>
					<td><small>
						{{ link_to_route('ubahcodes', 'Ubah', array($temp->id), array('class' => 'btn btn-small btn-info')) }}
						{{ link_to_route('hapuscodes', 'Hapus', array($temp->id), array('class' => 'btn btn-small btn-info')) }}				
						{{ link_to_route('berandacodesdetail', 'Detail', array($temp->codesxheadxxx), array('class' => 'btn btn-small btn-info')) }}					
					</small></td>					
				</tr>
			@endforeach
		</table>

		{{ $daftar->links() }}

	{{-- Bila codes tidak ada --}}
	@else
		<p id="tengah">Maaf, Anda belum memiliki data Codes. </p>
		<p id="tengah"><a href="{{ route('buatcodes') }}" class="btn btn-small btn-info">Tambah Data</a></p>
	@endif
@stop