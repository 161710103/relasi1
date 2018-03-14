@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Fasilitas
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Fasilitas</label>	
			  			<input type="text" name="nama_fasilitas" class="form-control" value="{{ $fsl->nama_fasilitas }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Kamar</label>	
			  			<input type="text" name="nomor_kamar" class="form-control" value="{{ $fsl->nomor_kamar }}"  readonly>@foreach($fsl->Kamar as $data)
			  				-{{ $data->nomor_kamar }}
			  				@endforeach
			  			 
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection