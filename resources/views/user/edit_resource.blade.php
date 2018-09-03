@extends('admin_template')

@section('content')
<a href="/project/{{ Auth::user()->id }}" class="btn bg-olive margin">Project</a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}" class="btn bg-olive margin"><strong>{{ $data_project->name_project }}</strong></a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a class="btn bg-olive margin"><strong>{{ $data_resource->name_resource }}</strong></a>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Resource - {{ $data_resource->name_resource }}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form role="form" method="POST" action="{{action('ProjectController@edit_resource_update')}}">
                      {{ csrf_field() }}
                      <input type="hidden" name="resource_id" value="{{ $data_resource->id }}">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="Endpoints">Method</label>
                               <select name="method" class="form-control">
                                  <option value="{{ $data_resource->type }}">{{ $data_resource->type }} (current)</option>
                                  <option value="POST">POST</option>
                                  <option value="GET">GET</option>
                                  <option value="DELETE">DELETE</option>
                                  <option value="PUT">PUT</option>
                               </select>
                          </div>

                          <div class="form-group">
                              <label for="schema">Schema (optional)</label>
                              <p> Define Resource schema, this will be used to generate mock data </p>
                              <!-- <div class="input_fields_wrap">
                                  <button class="add_field_button btn btn-primary"><i class="fa fa-plus"></i></button>
                                  
                              </div> -->
                          </div>


                      <!-- <div class="form-group">
                          <button class="add_field_button btn btn-primary" title="Add New Field"><i class="fa fa-plus"></i></button> <br><br>
                          <div class="row daftar-isi">
                            <div class="skema">
                              <div class="col-xs-4">
                                <input class="form-control namefield" type="text" onkeyup="nospaces(this)" name="field[field1][key]" value="id">
                              </div>
                              <div class="col-xs-4">
                                <input class="form-control valuefield" type="text" name="field[field1][value]"value="ObjectID" readonly="">
                              </div>
                            </div>
                              <br><br>
                          </div>
                      </div> -->
                      <div class="form-group">
                      	<button class="add_field_button btn btn-primary" title="Add New Field"><i class="fa fa-plus"></i></button><br><br>
                      	<div class="row daftar-isi">
                      		@php $no = 1; @endphp
		                      @foreach($data_skema as $data)
		                      		@if($data->type_schema == 'array')
		                      			<br><br>
		                     			<div class="skema">
		                     				@php $hiha = $data->field; @endphp
		                     				
		                     				<div class="col-xs-4">
		                     					<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][key]" value="{{ $data->name_schema }}">
		                     				</div>
		                     				<div class="col-xs-4">
		                     					<select class="form-control select2 select_type" name="field[{{ $data->field }}][value]" style="width: 100%;" id="type">
		                     						@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id) @if($data->type_schema == $opsi->name_opsi) <option value="{{ $data->type_schema }}" selected="selected">{{ $opsi->value_opsi }} (Current)</option>  @else <option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endif  @endforeach @endisset</optgroup>@endforeach @endisset
		                     					</select>
		                     					
		                     				</div>
		                     					<p class="add_array"><a href="#" class="btn btn-danger remove_field" title="Delete"><i class="fa fa-remove"></i></a> <a class="skema_add_field btn btn-primary" title="Add New Array"><i class="fa fa-plus"></i></a></p><div class="br"><br></div>
		                     				@php $nomor = 1; $nomor2 = 1; $nomor3 = 1; @endphp
		                     				@foreach($data_skema as $data2)	
			                     				@if($data2->parent_id != '' && $data2->field == $hiha)
				                     				<div class="col-xs-4"></div>
				                     				<div class="col-md-4 skema2">
						                     			<div class="new_form d{{ $nomor++ }} form-group">
						                     				<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][value][array][data][]" value="{{ $data2->name_schema }}">
						                     			</div>	
						                     	 	</div>
						                     	 	<div class="col-md-3 skema3">
						                     			<div class="new_form2 d{{ $nomor2++ }} form-group">
						                     				<!-- <input type="text" class="form-control valuefield" onkeyup="nospaces(this)" name="field[{{ $data2->field }}][value][array][type][]" value="{{ $data2->type_schema }}">	 -->
						                     				<select class="form-control select2" name="field[{{ $data->field }}][value][array][type][]" style="width: 100%;" id="type">
						                     				<!-- <option value="{{ $data2->type_schema }}">{{ $data2->type_schema }} (Current)</option> -->
				                     						@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id) @if($data2->type_schema == $opsi->name_opsi) <option value="{{ $data2->type_schema }}" selected="selected">{{ $opsi->value_opsi }} (Current)</option> @elseif($opsi->name_opsi == 'array') @else <option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endif  @endforeach @endisset</optgroup>@endforeach @endisset
				                     						</select>
						                     			</div>
						                     		</div>
						                     		<div class="col-md-1 skema4">
						                     			<div class="remove-button d{{ $nomor3++ }}">
						                     				<p class="remove_array"><a class="text-danger"><i class="fa fa-close"></i></a></p><br><p></p>
						                     			</div>
						                     		</div>
						                     		<!-- <div class="col-md-1 skema3">
						                     			<div class="new_form2 form-group">
						                     				<a href="#" class="btn btn-danger remove_field2" title="Delete"><i class="fa fa-remove"></i></a>
						                     			</div>
						                     		</div> -->
						                     	@endif
						                     @endforeach
						                     <br>
						                 </div>
						                 
		                     		@elseif ($data->parent_id == '')
		                     			<div class="skema">
		                     				<div class="col-xs-4">
		                     					<!-- {{ $data->name_schema }} -->
		                     					<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][key]" value="{{ $data->name_schema }}">
		                     				</div>
		                     				<div class="col-xs-4">
		                     					@if($data->type_schema == 'ObjectID')
		                     						@php $disabled = "disabled" @endphp
		                     						<input type="hidden" name="field[{{ $data->field }}][value]" value="{{ $data->type_schema }}">
		                     					@else
		                     						@php $disabled = "" @endphp
		                     					@endif
			                     					<select class="form-control select2 select_type" name="field[{{ $data->field }}][value]" style="width: 100%;" id="type" {{ $disabled }}>
							                     	@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id) @if($data->type_schema == $opsi->name_opsi) <option value="{{ $data->type_schema }}" selected="selected">{{ $opsi->value_opsi }} (Current)</option>  @else <option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endif  @endforeach @endisset</optgroup>@endforeach @endisset
					                     			</select>
		                     				</div>
		                     				@if($data->type_schema != 'ObjectID')		                     				
		                     					<p class="add_array"><a href="#" class="btn btn-danger remove_field" title="Delete"><i class="fa fa-remove"></i></a> </p>
		                     				@endif
		                     				<div class="col-xs-4"></div>
		                     				<div class="col-md-4 skema2"></div>
		                     				<div class="col-md-4 skema3"></div>
		                     			</div>
		                     		@endif

		                     			
		                       @endforeach
		                  	
	                  	</div>
	                   </div>                      

                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                  		<input type="hidden" name="ud" value="{{ Auth::user()->id }}"/>
                  		<input type="hidden" name="project_id" value="{{ $data_project->id }}">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->
                <div class="box-footer">
                   
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection