@extends('admin_template')

@section('content')
	<section id="get-started" class="padd-section wow fadeInUp content container-fluid">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <div class="box box-primary">
	          <div class="box-body">
	            <div class="feature-block">
	            	<h3 class=""><a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}" title="Back to Project"><i class="fa fa-chevron-circle-left fa-2x"></i></a> Resource {{ $data_resource->name_resource }}</h3>
	            	<hr>
	            	<form role="form" method="POST" action="{{action('ProjectController@edit_resource_update')}}">
	            		{{ csrf_field() }}
	            		<input type="hidden" name="resource_id" value="{{ $data_resource->id }}">
	            		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						<input type="hidden" name="project_id" value="{{ $data_project->id }}">
						<div class="form-group">
                  			<label>Schema</label>
                  			<div class="daftar-isi">
                  				@php $no = 1; @endphp
		                    	@foreach($data_skema as $data)
		                    		@if($data->type_schema == 'array')
		                    			<div class="row skema">
		                    				@php $hiha = $data->field; @endphp
		                    				<div class="col-xs-4 col-md-3 col-lg-3">
					                        	<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][key]" value="{{ $data->name_schema }}">
					                      	</div>
					                      	<div class="col-xs-4 col-md-3 col-lg-3">
					                      		<select class="form-control select2 select_type" name="field[{{ $data->field }}][value]" style="width: 100%;" id="type">
		                     						@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id) @if($data->type_schema == $opsi->name_opsi) <option value="{{ $data->type_schema }}" selected="selected">{{ $opsi->value_opsi }} (Current)</option>  @else <option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endif  @endforeach @endisset</optgroup>@endforeach @endisset
		                     					</select>
					                      	</div>
					                      	<p class="add_array"><a class="remove_field" title="Delete"><button type="button" class="baten baten-danger"><i class="fa fa-remove"></i> Delete Parents Field</button></a><a class="skema_add_field" title="Add New Array"><button type="button" class="baten baten-primary"><i class="fa fa-plus"></i> New Child Field</button></a></p>
					                      	@php $nomor = 1; $nomor2 = 1; $nomor3 = 1; @endphp
		                     				@foreach($data_skema as $data2)	
		                     					@if($data2->parent_id != '' && $data2->field == $hiha)
		                     						<div class="col-xs-3 col-md-3 col-lg-3"></div>
		                     						<div class="col-md-3 col-lg-3 skema2">
						                     			<div class="new_form d{{ $nomor++ }} form-group">
						                     				<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][value][array][data][]" value="{{ $data2->name_schema }}">
						                     			</div>	
						                     	 	</div>
						                     	 	<div class="col-md-3 col-lg-3 skema3">
						                     			<div class="new_form2 d{{ $nomor2++ }} form-group">
						                     				<!-- <input type="text" class="form-control valuefield" onkeyup="nospaces(this)" name="field[{{ $data2->field }}][value][array][type][]" value="{{ $data2->type_schema }}">	 -->
						                     				<p><select class="form-control select2" name="field[{{ $data->field }}][value][array][type][]" style="width: 100%;" id="type">
						                     				<!-- <option value="{{ $data2->type_schema }}">{{ $data2->type_schema }} (Current)</option> -->
				                     						@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id) @if($data2->type_schema == $opsi->name_opsi) <option value="{{ $data2->type_schema }}" selected="selected">{{ $opsi->value_opsi }} (Current)</option> @elseif($opsi->name_opsi == 'array') @else <option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endif  @endforeach @endisset</optgroup>@endforeach @endisset
				                     						</select></p>
						                     			</div>
						                     		</div>
						                     		<div class="col-xs-2 col-md-2 col-lg-2 skema4">
						                     			<div class="remove-button d{{ $nomor3++ }}">
						                     				<p class="remove_array"><a title="Delete Child Field"><button type="button" class="baten baten-danger"><i class="fa fa-close"></i></button></a></p>
						                     			</div>
						                     		</div>
						                     		<div class="col-xs-12 col-md-12 col-lg-12"></div>
		                     					@endif
		                     				@endforeach
		                    			</div>
		                    		@elseif($data->parent_id == '')
		                    			<div class="row skema">
		                    				<div class="col-xs-4 col-md-3 col-lg-3">
		                     					<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][key]" value="{{ $data->name_schema }}">
		                     				</div>
		                     				<div class="col-xs-4 col-md-3 col-lg-3">
		                     					@if($data->type_schema == 'ObjectID')
		                     						@php $disabled = "disabled" @endphp
		                     						<input type="hidden" name="field[{{ $data->field }}][value]" value="{{ $data->type_schema }}">
		                     						<select class="form-control select2 select_type" name="field[{{ $data->field }}][value]" style="width: 100%;" id="type" {{ $disabled }}>
							                     	<option value="{{ $data->type_schema }}">Object ID</option>
					                     			</select>
					                     			<br><br>
		                     					@else
		                     						@php $disabled = "" @endphp
		                     						<select class="form-control select2 select_type" name="field[{{ $data->field }}][value]" style="width: 100%;" id="type" {{ $disabled }}>
							                     	@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id) @if($data->type_schema == $opsi->name_opsi) <option value="{{ $data->type_schema }}" selected="selected">{{ $opsi->value_opsi }} (Current)</option>  @else <option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endif  @endforeach @endisset</optgroup>@endforeach @endisset
					                     			</select>
					                     			<br><br>
		                     					@endif
		                     						
		                     				</div>
		                     				@if($data->type_schema != 'ObjectID')
		                     					<p class="add_array"><a class="remove_field" title="Delete"><button type="button" class="baten baten-danger"><i class="fa fa-remove"></i> Delete Parents Field</button></a></p>		         
		                     					<div class="col-xs-3"></div>
		                     					<div class="col-md-3 skema2"></div>
		                     					<div class="col-md-3 skema3"></div> 
		                     					<div class="col-xs-2 col-md-2 col-lg-2 skema4"></div>  

		                     				@endif
		                    			</div>
		                    		@endif
		                    	@endforeach
                  			</div>
                  			<hr>
                  			<button type="button" class="add_field_button btn btn-primary" title="Add New Field"><i class="fa fa-plus"></i> Add New Parents Field</button>
                  			<button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                  		</div>
	            	</form>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@endsection