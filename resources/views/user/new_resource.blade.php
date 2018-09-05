@extends('admin_template')

@section('content')
  <section id="get-started" class="padd-section wow fadeInUp content container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">
            <div class="feature-block">
              <h3 class=""><a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}" title="Back to Project"><i class="fa fa-chevron-circle-left fa-2x"></i></a> New Resource</h3>
                <hr>
              <form method="POST" action="{{action('ProjectController@add_resource')}}" role="form" >
                {{ csrf_field() }}
                <input type="hidden" name="project_id" value="{{ $data_project->id }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group">
                  <label for="ResourceName">Resource Name</label>
                  <p>Enter meaningful resource name, it will be used to generate RESTful API URLs</p>
                  <p>EXAMPLE: users, comments, articles </p>
                  <input type="text" class="form-control" id="resourcename" name="resource_name" onkeyup="nospaces(this)" placeholder="Enter Resource Name" required>
                </div>
                <div class="form-group">
                  <label>Schema</label>
                  <div class="daftar-isi">
                    <div class="row skema">
                      <div class="col-xs-4 col-md-3 col-lg-3">
                        <input class="form-control namefield" type="text" onkeyup="nospaces(this)" name="field[field1][key]" value="id">
                      </div>
                      <div class="col-xs-4 col-md-3 col-lg-3">
                        <input class="form-control valuefield" type="text" name="field[field1][value]"value="ObjectID" readonly="">
                      </div>
                    </div>
                    <br>
                  </div> 
                  <button type="button" class="add_field_button btn btn-primary" title="Add New Field"><i class="fa fa-plus"></i></button>
                  <button type="submit" class="btn btn-primary pull-right">Create</button>                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection