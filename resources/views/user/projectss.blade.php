@extends('admin_template')

@section('content')
<a href="/project/{{ Auth::user()->id }}" class="btn bg-olive margin">Project</a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a class="btn bg-olive margin"><strong>{{ $data_project->name_project }}</strong></a>
    <div class="row">
        <div class="col-md-12">  
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">API Endpoint for <strong>{{ $data_project->name_project }}</strong></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <pre><strong>{{ url('/') }}/api/{{ $data_project->name_project }}</strong>/:endpoint</pre><br>
                    If you want use <strong>GET</strong> by <strong>ID</strong> use this ; <pre>{{ url('/') }}/api/{{ $data_project->name_project }}/:endpoint<strong>/1</strong></pre>
                    <br>
                        <a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}/new_resource" class="btn btn-primary">New Resource</a>
                        <br /><br />

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ Session::get('success')}}
                </div>
            @elseif (Session::has('failed'))
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-close"></i> Failed!</h4>
                {{ Session::get('failed')}}
                </div>
            @endif
        </div>

        @foreach ($data_resource as $data)
        <!-- <a href="{{ url($data_project->endpoint, $data->id) }}">{{ $data->name_resource }}</a> -->
            <div class='col-md-3'>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resource <strong><a href="/api/{{ $data_project->name_project }}/{{ $data->name_resource }}">{{ $data->name_resource }}</a></strong></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                            <p><a class="btn btn-success" href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}/resource/{{ $data->id }}"><i class="fa fa-edit"></i> Edit Resource</a></p>
                            <p><form class="form-horizontal" method="POST" action="{{action('ProjectController@generate_data')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="resource_id" value="{{ $data->id }}">
                                <input type="hidden" name="endpoint" value="{{ $data_project->endpoint }}">
                                <input type="hidden" name="pid" value="{{ $data_project->id }}">
                                <input type="hidden" name="ud" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="nrs" value="{{ $data->name_resource }}">
                                <button type="submit" class="btn btn-primary">Generate Data</strong></button>
                            </form></p>
                            <p><form class="form-horizontal" method="POST" action="{{action('ProjectController@delete_resource')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="resource_id" value="{{ $data->id }}">
                                <input type="hidden" name="pid" value="{{ $data_project->id }}">
                                <input type="hidden" name="ud" value="{{ Auth::user()->id }}">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Resource</strong></button>
                            </form></p>
                    </div>
                </div>
            </div>
        @endforeach

    </div><!-- /.row -->
@endsection