@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Group terdaftar --}}
	@if(count($cari))
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
			<th style="width:200px">Group ID</th>
			<th style="width:350px">Group</th>					
			<th style="width:350px">Aksi</th>				
			@foreach($cari as $temp)
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
		<br>
		<p id="tengah">
		<a href="{{ route('berandagroup') }}" class="btn btn-small btn-info">Kembali</a> </p>

	{{-- Bila Group tidak ada --}}
	@else
		<h3 id="tengah">
			Maaf, kata yang Anda maksud tidak ditemukan. <br/><br/>
			<a href="{{ route('berandagroup') }}" class="btn btn-small btn-info">Kembali</a>
		</h3>
		<br/>
		@if(count($daftar))
		<p id="tengah">Atau mungkin yang Anda maksud adalah ini :</p>
		<table class="table table-striped table-bordered">			
			<th style="width:200px">Group ID</th>
			<th style="width:350px">Group</th>			
			@foreach($daftar as $temp)
				<tr>					
					<td>{{ $temp->groupxgroupid }}</td>
					<td>{{ $temp->groupxgroupxx }}</td>					
				</tr>
			@endforeach
		</table>
		@endif
	@endif
@stop