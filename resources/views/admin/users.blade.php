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
	          	<h4>List Users</h4><hr>
	            <table id="example" class="table table-striped table-bordered" style="width:100%">
	              <thead>
	                <tr>
	                    <th>#</th>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Role</th>
	                    <th>Registered at</th>
	                    <th>Action</th>
	                </tr>
	              </thead>
	              <tbody>
	                @php $no = 1; @endphp
	                @foreach($data_user as $user)
	                <tr>
	                    <td><a>#{{ $no++ }}</a></td>
	                    <td>{{ $user->name }}</td>
	                    <td>{{ $user->email }}</td>
	                    <td>{{ $user->role }}</td>
	                    <td>{{ $user->created_at }}</td>
	                    <td><form class="form-horizontal" method="POST" action="{{action('AdminController@delete_user')}}">
	                        {{ csrf_field() }}
	                        <input type="hidden" name="ud" value="{{ $user->id }}">
	                       <button class="btn btn-danger" type="submit"
	                          @if($user->role == 'Administrator')
	                            disabled="disabled"
	                          @endif
	                        ><i class="fa fa-trash"></i></button>
	                      </form></td>
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