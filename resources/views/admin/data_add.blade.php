@extends('admin_template')

@section('content')
    <section id="get-started" class="padd-section wow fadeInUp content container-fluid">
    	<div class="container">
	      <div class="row">
	        <div class="col-xs-12 col-md-12 col-lg-12">
	        	<div class="block-box">
	        		<h4>Add New Mock Data</h4><hr>
	        		<form class="form-horizontal" method="POST" action="{{ url('/') }}/admin/data_opsi/tambah/proses">
	                  {{ csrf_field() }}
	                  <div class="box-body">
	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">Name Data</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" name="namedata" placeholder="Masukkan nama data" required="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">Value Data</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" name="valuedata" placeholder="Masukkan value data" required="">
	                        <small>Silahkan cari di <a href="https://github.com/fzaninotto/Faker">Github Fzaninotto</a></small>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">Category</label>
	                      <div class="col-sm-10">
	                        <select class="form-control select2" name="category" required="">
	                        	<option value="">Pilih kategori</option>
	                        	@foreach($data_opsigroup as $data)
	                        		<option value="{{ $data->id }}">{{ $data->option_grup }}</option>
	                        	@endforeach
	                        </select>
	                      </div>
	                    </div>

	                  <div class="box-footer">
	                    <a href="/admin/data_opsi" class="btn btn-primary pull-left">Back</a>
	                    <button type="submit" class="btn btn-primary pull-right">Tambah Data</button>
	                  </div>
	                  <!-- /.box-footer -->
	                </form>
	        	</div>
	        </div>
	      </div>
	    </div>
	</section>

@endsection