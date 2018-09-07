@extends('admin_template')

@section('content')
	<section id="get-started" class="padd-section wow fadeInUp content container-fluid">
    	<div class="container">
	      <div class="row">
	        <div class="col-xs-12 col-md-12 col-lg-12">
	        	<div class="block-box">
	        		<h4>Edit Mock Data "<i><u>{{ $data_opsi->value_opsi }}</u></i>"</h4><hr>
	        		<form class="form-horizontal" method="POST" action="{{ url('/') }}/admin/data_opsi/edit/proses">
	                  {{ csrf_field() }}
	                  <input type="hidden" name="id" value="{{ $data_opsi->id }}">
	                  <div class="box-body">
	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">Name Data</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" name="namedata" placeholder="Masukkan nama data" value="{{ $data_opsi->value_opsi }}" required="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">Value Data</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" name="valuedata" placeholder="Masukkan value data" value="{{ $data_opsi->name_opsi }}" required="">
	                        <small>Silahkan cari di <a href="https://github.com/fzaninotto/Faker">Github Fzaninotto</a></small>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">Category</label>
	                      <div class="col-sm-10">
	                        <select class="form-control select2" name="category" required="">
	                        	<option value="">Pilih kategori</option>
	                        	@foreach($data_opsigroup as $data)
	                        		@if($data_opsi->skemaopsigroup_id == $data->id)
	                        		<option value="{{ $data->id }}" selected="">{{ $data->option_grup }}</option>
	                        		@else
	                        		<option value="{{ $data->id }}">{{ $data->option_grup }}</option>
	                        		@endif
	                        	@endforeach
	                        </select>
	                      </div>
	                    </div>

	                  <div class="box-footer">
	                    <a href="/admin/data_opsi" class="btn btn-primary pull-left">Back</a>
	                    <button type="submit" class="btn btn-primary pull-right">Edit Data</button>
	                  </div>
	                  <!-- /.box-footer -->
	                </form>
	        	</div>
	        </div>
	      </div>
	    </div>
	</section>
@endsection