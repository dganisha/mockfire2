@extends('admin_template')

@section('content')
  <section id="get-started" class="padd-section wow fadeInUp">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="section-title text-center">
    				<h3>{{ $data_project->name_project }}</h3><hr>
	    			<div class="block-box">
              <h4>Api Endpoint for <strong>{{ $data_project->name_project }}</strong></h4>
	    				<pre><strong class="text-danger">{{ url('/') }}/api/{{ $data_project->name_project }}</strong>/:endpoint</pre><br>
	                    If you want use <strong>GET</strong> by <strong>ID</strong> use this ; <pre class="text-danger">{{ url('/') }}/api/{{ $data_project->name_project }}/:endpoint<strong>/1</strong></pre>
	                    <a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}/new_resource" class="btn btn-primary"><span class="text-white">New Resource</span></a>
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Invite Firends</a>
	    			</div>
    			</div>
    		</div>
    	</div>    	
    </div>

<!--     @if(count($errors) > 0)
      @foreach($errors->all() as $error)
        <script>swal("Failed!", "{{ error }}", "error");</script>
      @endforeach
    @endif -->

    @if (Session::has('success'))
    	<script>swal("Success!", "{{ Session::get('success')}}", "success");</script>
    @elseif(Session::has('failed'))
    	<script>swal("Failed!", "{{ Session::get('failed')}}", "error");</script>
    @endif

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="block-box table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Name Resource</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach($data_resource as $data)
                  <tr id="{{ $data->id }}">
                    <td>{{ $no++ }}</td>
                    <td><a href="/api/{{ $data_project->name_project }}/{{ $data->name_resource }}" target="_blank"><strong>{{ $data->name_resource }}</strong></a></td>
                    <td class="text-center">
                      <a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}/resource/{{ $data->id }}" class="text-white"><button type="button" class="baten baten-warning"><i class="fa fa-edit fa-1x"></i> Edit Data</button></a>
                      <a class="delete-resource text-danger" data-resource="{{ $data->id }}"><button type="button" class="baten baten-danger"><i class="fa fa-trash-o fa-1x"></i> Delete Data</button></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Invites Friend</h4>
              </div>
              <form class="form-horizontal" method="POST" action="{{action('ProjectController@invite_project')}}">
                {{ csrf_field() }}
                <div class="modal-body">
                  Input Email of Friend
                  <input class="form-control" type="email" name="email" placeholder="Email your friend">
                  <input type="hidden" name="projectid" value="{{ $data_project->id }}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Invite</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

    <!-- <div class="container text-center">
      <div class="row">
      	@foreach ($data_resource as $data)
      	<div class="col-md-6 col-lg-4" id="{{ $data->id }}">
          <div class="block-box">
            <img src="{{ asset("/mockfire/img/svg/code.svg") }}" alt="img" class="img-fluid">
            <h4>Resource <a href="/api/{{ $data_project->name_project }}/{{ $data->name_resource }}">{{ $data->name_resource }}</a></h4>

           		<a class="btn btn-success" href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}/resource/{{ $data->id }}"><span class="text-white"><i class="fa fa-edit"></i> Edit Resource</span></a>
           		 <form class="form-horizontal" method="POST" action="{{action('ProjectController@generate_data')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="resource_id" value="{{ $data->id }}">
                    <input type="hidden" name="endpoint" value="{{ $data_project->endpoint }}">
                    <input type="hidden" name="pid" value="{{ $data_project->id }}">
                    <input type="hidden" name="ud" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="nrs" value="{{ $data->name_resource }}">
                    <button type="submit" class="btn btn-primary">Generate Data</strong></button>
                </form>
                <button type="submit" class="btn btn-danger delete-resource" data-resource="{{ $data->id }}"><i class="fa fa-trash"></i> Delete Resource</strong></button>
                
          </div>
        </div>
      	@endforeach
      </div>
    </div> -->

  </section>
@endsection