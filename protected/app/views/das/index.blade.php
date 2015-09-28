@extends('_layouts.layouthome')
@section('contenthome')

	{{-- Bila das terdaftar --}}
	<br>
	@if(count($daftar))
	<br>
		<a href="{{ route('buatdas') }}" id="baru" class="btn btn-small btn-info">Tambah Data</a>
		<br>
		<br>
		{{ Form::open(array('route' => 'cari-das', 'style' => 'padding-left:0px;padding-bottom:10px')) }}
		<table>
			<tr>
				<td width="50">{{ Form::label('cari', 'Cari   ') }}</td>  
				<td>{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px', 'class' => 'form-control')) }}	</td>							
				<td><small><i>*Tekan Enter</i></small></td>
			</tr>
		</table>			
	    {{ Form::close() }}	

		<table class="table table-striped table-bordered">
			<th style="width:200px"><a href="{{ route('urut-das', 'wilsngkodewsx') }}">Kode WS</a></th>
			<th style="width:350px"><a href="{{ route('urut-das', 'wilsngnamawsx') }}">Nama WS</a></th>
            <th style="width:350px"><a href="{{ route('urut-das', 'dasxxxkodedas') }}">Kode Das</a></th>
			<th style="width:350px"><a href="{{ route('urut-das', 'dasxxxnamadas') }}">Nama Das</a></th>	
			<th style="width:350px">Aksi</th>
				
			@foreach($daftar as $temp)
				<tr>
					<td>{{ $temp->wilsngkodewsx }}</td>
					<td>{{ $temp->wilsngnamawsx }}</td>
                    <td>{{ $temp->dasxxxkodedas }}</td>
					<td>{{ $temp->dasxxxnamadas }}</td>
					<td><small>
						{{ link_to_route('ubahdas', 'Ubah', array($temp->id), array('class' => 'btn btn-small btn-info')) }}
						{{ link_to_route('hapusdas', 'Hapus', array($temp->id), array('class' => 'btn btn-small btn-info')) }}									
					</small></td>					
				</tr>
			@endforeach
		</table>
		{{ $daftar->links() }}
	{{-- Bila Das tidak ada --}}
	@else
	<br>
		<p id="tengah">Maaf, Anda belum memiliki data kamus. </p>
		<p id="tengah"><a href="{{ route('buatdas') }}" class="btn btn-small btn-info">Buat Baru</a></p>
	@endif
@stop