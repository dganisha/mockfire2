@extends('admin_template')

@section('content')
	@if (Session::has('success'))
      <script>swal("Success!", "{{ Session::get('success')}}", "success");</script>
    @elseif (Session::has('failed'))
      <script>swal("Failed!", "{{ Session::get('failed')}}", "error");</script>
    @endif

    <section id="get-started" class="padd-section wow fadeInUp content container-fluid">
    	<div class="container">
	      <div class="row">
	        <div class="col-xs-12 col-md-12 col-lg-12">
	          <div class="block-box table-responsive">
	          	<h4>List Mock Data Category <a href="{{ url('/') }}/admin/data_category/tambah"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Category</button></a></h4><br><hr>
	            <table id="example" class="table table-striped table-bordered" style="width:100%">
	              <thead>
	                <tr>
	                    <th>#</th>
	                    <th>Name Category</th>
	                </tr>
	              </thead>
	              <tbody>
	                @php $no = 1; @endphp
	                @foreach($data_category as $d)
                    <tr>
                        <td><a href="{{ url('/') }}/admin/data_category/edit/{{ $d->id }}"><strong>{{ $no++ }}</strong></a></td>
                        <td>{{ $d->option_grup }}</td>
                    </tr>
                    @endforeach
	              </tbody>
	            </table>
	          </div>
	        </div>
	      </div>
	    </div>
    </section>
@endsection