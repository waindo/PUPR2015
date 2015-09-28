@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila sungai terdaftar --}}
	<br>
	@if(count($daftar))
		<br>
		<a href="{{ route('buat') }}" id="baru" class="btn btn-small btn-info">Tambah Data</a>
		<br>
		<br>
		{{ Form::open(array('route' => 'cari-sungai', 'style' => 'padding-left:0px;padding-bottom:10px')) }}
		<table>
			<tr>
				<td width="50">{{ Form::label('cari', 'Cari   ') }}</td>  
				<td>{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px', 'class' => 'form-control')) }}	</td>							
				<td><small><i>*Tekan Enter</i></small></td>
			</tr>
		</table>			
	    {{ Form::close() }}	
		
		<table class="table table-striped table-bordered">
			<th style="width:200px"><a href="{{ route('urut-sungai', 'dasxxxkodedas') }}">Kode DAS</a></th>
			<th style="width:200px"><a href="{{ route('urut-sungai', 'dasxxxnamadas') }}">Nama DAS</a></th>
			<th style="width:350px"><a href="{{ route('urut-sungai', 'sungaikodesng') }}">Kode Sungai</a></th>
			<th style="width:350px"><a href="{{ route('urut-sungai', 'sungainamasng') }}">Nama Sungai</a></th>	
			<th style="width:350px">Aksi</th>
				
			@foreach($daftar as $temp)
				<tr>
					<td>{{ $temp->dasxxxkodedas }}</td>
					<td>{{ $temp->dasxxxnamadas }}</td>
					<td>{{ $temp->sungaikodesng }}</td>
					<td>{{ $temp->sungainamasng }}</td>
					<td><small>
						{{ link_to_route('ubah', 'Ubah', array($temp->id), array('class' => 'btn btn-small btn-info')) }}
						{{ link_to_route('hapus', 'Hapus', array($temp->id), array('class' => 'btn btn-small btn-info')) }}									
					</small></td>	
				</tr>
			@endforeach
		</table>
		{{ $daftar->links() }}

		
	{{-- Bila kamus tidak ada --}}
	@else
	<br>
		<p id="tengah">Maaf, Anda belum memiliki data kamus. </p>
		<p id="tengah"><a href="{{ route('buat') }}" id="baru" class="btn btn-small btn-info">Buat Baru</a></p>
	@endif
@stop