@extends('_layouts.layouthome')
@section('contenthome')
	<br/>
	<br>
	{{ Form::open(array('route' => 'post-buatws')) }}
		<table>
			<tr>
				<td width="100">{{ Form::label('wilsngkodewsx', 'Kode WS') }}</td>
				<td>{{ Form::text('wilsngkodewsx', null, array('placeholder' => 'Kode WS','style'=>'width: 200px', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('wilsngkodewsx'))
						<small>{{ $errors->first('wilsngkodewsx') }}</small>
					@endif
				</td>
			</tr>
			<tr>	
				<td>{{ Form::label('wilsngpulauxx', 'Pulau') }}</td>
				<td>{{Form::select('wilsngpulauxx', $pulau, null, array('id' => 'spulau', 'class' => 'form-control', 'style'=>'width: 200px'))  }}</td>
				<td>
					@if($errors->has('wilsngpulauxx'))
						<small>{{ $errors->first('wilsngpulauxx') }}</small>
					@endif
				</td>
			</tr>
			<tr>	
				<td>{{ Form::label('wilsngnamawsx', 'Nama WS') }}</td>
				<td>{{ Form::text('wilsngnamawsx', null, array('placeholder' => 'Nama WS', 'style'=>'width: 200px', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('wilsngnamawsx'))
						<small>{{ $errors->first('wilsngnamawsx') }}</small>
					@endif
				</td>
			</tr>
			<tr>	
				<td>{{ Form::label('wilsngkategri', 'Kategori') }}</td>
				<td>{{Form::select('wilsngkategri', $kategori, null, array('id' => 'skategori', 'class' => 'form-control', 'style'=>'width: 200px'))  }}</td>
				<td>
					@if($errors->has('wilsngkategri'))
						<small>{{ $errors->first('wilsngkategri') }}</small>
					@endif
				</td>
			</tr>
		</table>
		<br>
		<p id="tengah">{{ Form::submit('Save', array('class' => 'btn btn-small btn-info')) }} </p>
		{{ Form::close() }}

        {{ Form::open(array('route' => 'buatwsprov')) }}
		<hr width="50%" align="center">		 
		<table>

			<tr>
				<td width="100">{{ Form::label('wlsdtlkodewsx', 'Kode WS') }}</td>
				<td>{{ Form::text('wlsdtlkodewsx', null, array('placeholder' => 'Kode WS','style'=>'width: 200px', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('wlsdtlkodewsx'))
						<small>{{ $errors->first('wlsdtlkodewsx') }}</small>
					@endif
				</td>
			</tr>

			<tr>
				<td>{{ Form::label('wlsdtlkodprov', 'Provinsi') }}</td>
				<td>{{Form::select('wlsdtlkodprov', $provinsi, null, array('id' => 'provinsi', 'class' => 'form-control', 'style'=>'width: 200px'))  }}</td>
				<td>
					@if($errors->has('wlsdtlkodprov'))
						<small>{{ $errors->first('wlsdtlkodprov') }}</small>
					@endif
				</td>
			</tr>
		</table>

		<br>
		<table>
		<tr>	
		<td>{{ Form::submit('Tambah', array('class' => 'btn btn-small btn-info')) }}</td>	
		{{ Form::close() }}			
		</tr>
		</table>
		<br>
		<table class="table table-striped table-bordered">		   
			
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngnamawsx') }}">Provinsi </a></th>
			<th style="width:350px"><a href="{{ route('urut-ws', 'wilsngkategri') }}">Action</a></th>		
			
			@foreach($prov as $temp)

				<tr>				 
					<td>{{ $temp->wlsdtlkodprov }}</td>					
					<td><small>{{ link_to_route('hapuswsprov', 'Hapus', $temp->id) }}</small></td>
				</tr>
			@endforeach	
			
		</table>


		<br>
		<p id="tengah"><a href="{{ route('berandadas') }}" class="btn btn-small btn-info">DAS</a>  
		               <a href="{{ route('beranda') }}" class="btn btn-small btn-info">Sungai</a>  
		               <a href="{{ route('berandaws') }}" class="btn btn-small btn-info">Kembali</a></p>
	
@stop