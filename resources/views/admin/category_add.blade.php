@extends('admin_template')

@section('content')
    <section id="get-started" class="padd-section wow fadeInUp content container-fluid">
    	<div class="container">
	      <div class="row">
	        <div class="col-xs-12 col-md-12 col-lg-12">
	        	<div class="block-box">
	        		<h4>Add New Category</h4><hr>
	        		<form class="form-horizontal" method="POST" action="{{ url('/') }}/admin/data_category/tambah/proses">
	                  {{ csrf_field() }}
	                  <div class="box-body">
	                    <div class="form-group">
	                      <label class="col-sm-2 control-label">Name Category</label>
	                      <div class="col-sm-10">
	                        <input type="text" class="form-control" name="namec" placeholder="Masukkan nama Category . exam : INTERNET" required="">
	                      </div>
	                    </div>

	                  <div class="box-footer">
	                    <a href="/admin/data_category" class="btn btn-primary pull-left">Back</a>
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