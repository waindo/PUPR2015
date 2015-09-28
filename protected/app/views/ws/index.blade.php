@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Ws terdaftar --}}
	<br>

	@if(count($daftar))
		<br>
		<a href="{{ route('buatws') }}" id="baru" class="btn btn-small btn-info">Tambah Data</a>
		<br>
		<br>
		{{ Form::open(array('route' => 'cari-ws', 'style' => 'padding-left:0px;padding-bottom:10px')) }}
		<table>
			<tr>
				<td width="50">{{ Form::label('cari', 'Cari   ') }}</td>  
				<td>{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px', 'class' => 'form-control')) }}	</td>							
				<td><small><i>*Tekan Enter</i></small></td>
			</tr>
		</table>			
	    {{ Form::close() }}

				
		<table class="table table-striped table-bordered">
			<th style="width:200px"><a href="{{ route('urut-ws', 'wilsngkodewsx') }}">No</a></th>
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngnamawsx') }}">Kode WS</a></th>
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngnamawsx') }}">Nama WS</a></th>
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngkategri') }}">Pulau</a></th>	
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngkategri') }}">Kategori</a></th>	
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngkategri') }}">DAS</a></th>
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngkategri') }}">Sungai</a></th>		
			
				
			@foreach($daftar as $temp)

				<tr>
				 
					<td>{{ $jml->jmlcount }}</td>
				 
					<td>{{ $temp->wilsngkodewsx }}</td>
					<td>{{ $temp->wilsngnamawsx }}</td>
					<td>{{ $temp->wilsngpulauxx }}</td>
					<td>{{ $temp->wilsngkategri }}</td>
					<td>{{ $temp->dasxxxnamadas }}</td>
					<td>{{ $temp->sungainamasng }}</td>
				</tr>
			@endforeach
		</table>
		{{ $daftar->links() }}

		
	{{-- Bila kamus tidak ada --}}
	@else
		<p id="tengah">Maaf, Anda belum memiliki data kamus. <br>
		<a href="{{ route('buatws') }}" class="btn btn-small btn-info">Buat Baru</a></p>		
	 
	@endif
@stop