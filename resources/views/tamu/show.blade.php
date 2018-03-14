@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Tamu
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $tamu->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">NIK</label>	
			  			<input type="text" name="nik" class="form-control" value="{{ $tamu->nik }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nomor Kamar</label>	
			  			<input type="text" name="nomor_kamar" class="form-control" value="{{ $tamu->Kamar->nomor_kamar }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection