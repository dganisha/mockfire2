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
	          	<h4>List Mock Data <a href="{{ url('/') }}/admin/data_opsi/tambah"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data</button></a></h4><br><hr>
	            <table id="example" class="table table-striped table-bordered" style="width:100%">
	              <thead>
	                <tr>
	                    <th>#</th>
	                    <th>Name Opsi</th>
                        <th>Value Opsi</th>
                        <th>Category</th>
                        <th>Action</th>
	                </tr>
	              </thead>
	              <tbody>
	                @php $no = 1; @endphp
	                @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->value_opsi }}</td>
                        <td>{{ $d->name_opsi }}</td>
                        <td>{{ $d->skemaopsigroup->option_grup }}</td>
                        <td><a href="{{ url('/') }}/admin/data_opsi/edit/{{ $d->id }}"><button type="button" class="baten baten-warning"><i class="fa fa-edit"></i> Edit Mock Data</button></a></td>
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