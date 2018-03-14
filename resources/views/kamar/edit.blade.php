@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Kamar
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kamar.update',$kamar->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nomor_kamar') ? ' has-error' : '' }}">
			  			<label class="control-label">Nomor Kamar</label>	
			  			<input type="text" name="nomor_kamar" class="form-control" value="{{ $kamar->nomor_kamar }}" required>
			  			@if ($errors->has('nomor_kamar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nomor_kamar') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('fasilitas_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Fasilitas</label>	
			  			<select name="fasilitas_id" class="form-control">
			  				@foreach($fsl as $data)
			  				<option value="{{ $data->id }}" {{ $selectedFasilitas == $data->nama_fasilitas ? 'selected="selected"' : '' }} >{{ $data->id }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('fasilitas_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fasilitas_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection