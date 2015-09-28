@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Codes terdaftar --}}
	@if(count($codes))
	<br>
	<br>	 
		<a href="{{ route('buatcodesdetail', $daftar->codesxheadxxx) }}" id="Baru" class="btn btn-small btn-info">Tambah Data</a>
		<a href="{{ route('berandacodes') }}" id="Baru" class="btn btn-small btn-info">Kembali</a>
	<br>
	<br>

	<table class="table table-striped table-bordered">					
			<th style="width:200px">Desc 1</th>
			<th style="width:350px">Desc 2</th>					
			<th style="width:200px">Aksi</th>
			@foreach($codes as $temp)
				<tr>						
					<td>{{ $temp->codesxdesc1xx }}</td>
					<td>{{ $temp->codesxdesc2xx }}</td>		
					<td><small>
						{{ link_to_route('ubahcodesdetail', 'Ubah', array($temp->id), array('class' => 'btn btn-small btn-info')) }}
						{{ link_to_route('hapusdetail', 'Hapus', array($temp->id, $temp->codesxheadxxx), array('class' => 'btn btn-small btn-info')) }}										
					</small></td>													
				</tr>
			@endforeach
	</table>

	{{ $codes->links() }}
 	
 	@else
 		<br>
 		<br>
 		<p id="tengah">Maaf, Anda belum memiliki data Detail Codes. <br><br>
		<a href="{{ route('buatcodesdetail', $daftar->codesxheadxxx) }}" id="Baru" class="btn btn-small btn-info">Tambah Data</a>
		<a href="{{ route('berandacodes') }}" id="Baru" class="btn btn-small btn-info">Kembali</a>
		</p>
 	@endif	
	
@stop