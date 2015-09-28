@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Group terdaftar --}}
	@if(count($cari))
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
			<th style="width:200px">Jenis (IND)</th>
			<th style="width:350px">Jenis (ENG)</th>					
			<th style="width:350px">Aksi</th>				
			@foreach($cari as $temp)
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

 

	{{-- Bila Code tidak ada --}}
	@else
		<h3 id="tengah">
			<br>
			Maaf, kata yang Anda maksud tidak ditemukan. <br/><br/>
			<a href="{{ route('berandacodes') }}" class="btn btn-small btn-info">Kembali</a>
		</h3>
		<br/>
		@if(count($daftar))
		<p id="tengah">Atau mungkin yang Anda maksud adalah ini :</p>
		<table class="table table-striped table-bordered">			
			<th style="width:200px">Jenis (IND)</th>
			<th style="width:350px">Jenis (ENG)</th>							
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