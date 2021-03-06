@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Tamu
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('tamu.update',$tamu->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama </label>	
			  			<input type="text" name="nama" value="{{ $tamu->nama }}" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nik') ? ' has-error' : '' }}">
			  			<label class="control-label">NIK </label>	
			  			<input type="text" name="nik" value="{{ $tamu->nik }}" class="form-control"  required>
			  			@if ($errors->has('nik'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nik') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kamar_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kamar Id</label>	
			  			<select name="kamar_id" class="form-control">
			  				@foreach($kamar as $data)
			  				<option value="{{ $data->id }}" {{ $selectedkamar == $data->id ? 'selected="selected"' : '' }} >{{ $data->nomor_kamar }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kamar_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kamar_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection