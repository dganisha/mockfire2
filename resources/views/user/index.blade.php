@extends('admin_template')

@section('content')
  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h2>Create your own project now !</h2>
      <p>
        <a href="" class="btn-get-started scrollto" data-toggle="modal" data-target="#modal-default">Create Project</a> 
        <a href="#get-started" class="btn-get-started scrollto">My Projects</a>
      </p>
      <div class="btns">
        <div class="text-center">
          <p>“Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live” 
― John Woods</p>
        </div>        
      </div>
      @if (Session::has('success'))
      <script>swal("Success!", "{{ Session::get('success')}}", "success");</script>
      @elseif (Session::has('failed'))
      <script>swal("Failed!", "{{ Session::get('failed')}}", "error");</script>
      @endif
    </div>
  </section><!-- #hero -->

  <section id="get-started" class="padd-section wow fadeInUp content container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="block-box">
            <h3 class="text-center">Your Projects</h3>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Name Project</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach($data_project as $data)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->project->name_project }}
                      @if($data->project->user_id == Auth::user()->id)
                        <small>(MASTER)</small>
                      @endif
                    </td>
                    <td class="text-center">
                      <a href="/project/{{ Auth::user()->id }}/p/{{ $data->project->id }}" class="text-success"><i class="fa fa-external-link fa-1x"></i> Open</a>
                      <a href="" class="text-danger"><i class="fa fa-trash-o fa-1x"></i> Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>


  		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">New Project</h4>
              </div>
              <form class="form-horizontal" method="POST" action="{{action('ProjectController@add_project')}}">
              	{{ csrf_field() }}
	              <div class="modal-body">
	              	ex : Todoapp, github, secretproject
	                <input class="form-control" type="text" onkeyup="nospaces(this)" name="name_project" placeholder="Project Name">
	                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
	                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	              </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-success">Create</button>
	              </div>
	          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endsection