@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Group terdaftar --}}
	 <br>
	@if(count($daftar))
	    <br>
		<a href="{{ route('buatgroup') }}" id="baru" class="btn btn-small btn-info">Tambah Data</a>
		<br>
		<br>
    	{{ Form::open(array('route' => 'cari-group', 'style' => 'padding-left:0px;padding-bottom:10px')) }}
		<table>
			<tr>
				<td width="50">{{ Form::label('cari', 'Cari   ') }}</td>  
				<td>{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px', 'class' => 'form-control',)) }}	</td>							
				<td><small><i>*Tekan Enter</i></small></td>
			</tr>
		</table>			
	    {{ Form::close() }}	
		
		<table class="table table-striped table-bordered">
			<th style="width:200px"><a href="{{ route('urut-group', 'groupxgroupid') }}">Group ID</a></th>
			<th style="width:350px"><a href="{{ route('urut-group', 'groupxgroupxx') }}">Group</a></th>			
			<th style="width:350px">Aksi</th>
				
			@foreach($daftar as $temp)
				<tr>
					<td>{{ $temp->groupxgroupid }}</td>
					<td>{{ $temp->groupxgroupxx }}</td>					
					<td><small>
						{{ link_to_route('ubahgroup', 'Ubah', array($temp->id), array('class' => 'btn btn-small btn-info')) }}
						{{ link_to_route('hapusgroup', 'Hapus', array($temp->id), array('class' => 'btn btn-small btn-info')) }}									
					</small></td>
				</tr>
			@endforeach
		</table>
		<p id="tengah">{{ $daftar->links() }}</p>
	{{-- Bila kamus tidak ada --}}
	@else
		<p id="tengah">Maaf, Anda belum memiliki data kamus. </p>
		<p id="tengah">{{ link_to_route('buatgroup', 'Buat Baru') }}</p>
	@endif
@stop