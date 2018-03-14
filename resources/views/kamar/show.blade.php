@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Kamar
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nomor Kamar</label>	
			  			<input type="text" name="nomor_kamar" class="form-control" value="{{ $kamar->nomor_kamar}}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama Fasilitas</label>
						<input type="text" name="nama_fasilitas" class="form-control" value="{{ $kamar->Fasilitas->nama_fasilitas }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection