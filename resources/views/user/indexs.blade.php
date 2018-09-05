@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Project</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                    @if (Session::has('success'))
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ Session::get('success')}}
                      </div>
                    @endif
                </div>
                <div class="box-body">
                    Add new project <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>
              </button>
                </div><!-- /.box-body -->
                <div class="box-footer">
                   Your Project
                   <div class="box">
                   		@foreach($data_project as $data)
                   			<p><a href="{{ Auth::user()->id }}/p/{{ $data->id }}" class="btn btn-default btn-block">{{ $data->name_project }}</a></p>
                   		@endforeach
                   </div>
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
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
	                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-primary">Create</button>
	              </div>
	          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endsection