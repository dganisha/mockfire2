<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Resource;
use App\Skema;
use App\Skemaopsi;
use App\Skemaopsigroup;
use Faker\Factory as Faker;

use Storage;

class ProjectController extends Controller
{
	// Load data dari Tabel Skemaopsi

	public function loadData(Request $request)
	{
		$data = Skemaopsi::get();

		return response()->json($data);
	}

    public function add_project(Request $request) {
    	// return $request->all();

    	$name_project = $request->name_project;
    	$user_id = $request->user_id;

    	$rand_str = str_random(15);

    	$create_project = Project::create([
            'user_id' => $user_id,
            'name_project' => $name_project,
            'endpoint' => $rand_str,
        ]);

        // $create_directory = Storage::MakeDirectory(public_path($rand_str));

        $user_project = Project::where('user_id',$user_id)->get();

        if($create_project) {
        	return redirect('project/'.$user_id.'')->with('success','Success create project')->with('data_project',$user_project);
        }
    }

    public function get_project(Request $request, $id) {
    	$user_project = Project::where('user_id',$id)->orderBy('id','DESC')->get();

    	if ($user_project) {
    		// return $user_project;
    		// return redirect()->with('data_project',$user_project);
    		return view('user.index')->with('data_project',$user_project);
    	}
    }

    public function detail_project(Request $request, $id, $id_project) {
    	$user = User::where('id',$id)->first();
    	$project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	if($project){
    		$resource = Resource::where('project_id',$id_project)->get();
    		return view('user.projects')->with('data_resource',$resource)->with('data_project',$project);
    	}
    	
    }

    public function edit_resource(Request $request, $id, $id_project, $id_resources) {
    	$user = User::where('id',$id)->first();
    	$data_project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	if($data_project){
    		$data_resource = Resource::where('id',$id_resources)->first();
    		$data_skema = Skema::where('resource_id',$id_resources)->get();
    		$data_opsi = Skemaopsi::with('skemaopsigroup')->select('skemaopsigroup_id','name_opsi','value_opsi')->get();
    		$data_cek = Skema::where('resource_id',$id_resources)->where('type_schema','array')->get();
    		// return $cek;
    		// return $skema;
    		return view('user.edit_resource', compact('data_skema','data_project','data_resource','data_opsi','data_cek'));
    	}
    	
    }

    public function new_resource(Request $request, $id, $id_project) {
    	$user = User::where('id',$id)->first();
    	// $project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	// $opsiskema = Skemaopsi::get();
    	// $opsigroupnya = Skemaopsigroup::get();
    	// return view('user.new_resource')->with('data_project',$project)->with('data_opsi', $opsiskema)->with('data_group_opsi', $opsigroupnya);
    	$data_project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	$data_opsigroup = Skemaopsigroup::get();
    	$data_opsi = Skemaopsi::with('skemaopsigroup')->select('skemaopsigroup_id','name_opsi','value_opsi')->get();
    	
    	return view('user.new_resource', compact('data_project','data_opsi','data_opsigroup'));
    }

    public function add_resource(Request $request) {
    	// return $request->all();

    	$decode = $request->all();
    	// return $decode['field'];
    	// var_dump($decode['field']);
    	// return $decode['field'];
    	// return count($decode['field']);
    	$field = [];
    	$coy = time();

    	$create_resource = Resource::create([
	            'project_id' => $request->project_id,
	            'name_resource' => $request->resource_name,
	            'type' => $request->method,
	        ]);

    	foreach ($decode['field'] as $key => $form) {
    		// echo $value['key']." ";
    		// echo $key;
    		$form['key'];
    		$form['value'];

    		if(is_array($form['value'])) {
    			$val= 'array';
    		}else{
    			$val= $form['value'];
    		}

    		// echo $key." ";
	        $create_schema = Skema::create([
	            'resource_id' => $create_resource->id,
	            'name_schema' => $form['key'],
	            'type_schema' => $val,
	            'parent_id' => '',
	            'field' => $key,
	        ]);

    		if(is_array($form['value'])) {
    			foreach ($form['value']['array']['data'] as $ki => $value) {
    				Skema::create([
			            'resource_id' => $create_resource->id,
			            'name_schema' => $value,
			            'type_schema' => $form['value']['array']['type'][$ki],
			            'parent_id' => $create_schema->id,
			            'field' => $key,
			        ]);
    			}

    		}

    	}
    }

    public function generate_data(Request $request)
    {
    	// return $request->all();

    	$data = Skema::where('resource_id',$request->resource_id)->with('child')->get();
    	// return $data;
    	$faker = Faker::create();
    	foreach ($data as $key) {
    		foreach($key->child as $value) {
    			$d = $value->type_schema;
    			echo "<p>".$value->name_schema." : ".$faker->$d."</p>";

    		}
    	}
    }

    public function edit_resource_update(Request $request)
    {
    	// return $request->all();
    	$decode = $request->all();

    	// $field = [];
    	$coy = time();
    	$delete = Skema::where('resource_id', $request->resource_id)->delete();
    	if($delete) {
	    	foreach ($decode['field'] as $key => $form) {
	    		// echo $value['key']." ";
	    		// echo $key;
	    		$form['key'];
	    		$form['value'];

	    		if(is_array($form['value'])) {
	    			$val= 'array';
	    		}else{
	    			$val= $form['value'];
	    		}

	    		// echo $key." ";
	    		
	    		
			        $create_schema = Skema::create([
			            'resource_id' => $request->resource_id,
			            'name_schema' => $form['key'],
			            'type_schema' => $val,
			            'parent_id' => '',
			            'field' => $key,
			        ]);

		    		if(is_array($form['value'])) {
		    			foreach ($form['value']['array']['data'] as $ki => $value) {
		    				Skema::create([
					            'resource_id' => $request->resource_id,
					            'name_schema' => $value,
					            'type_schema' => $form['value']['array']['type'][$ki],
					            'parent_id' => $create_schema->id,
					            'field' => $key,
					        ]);
		    			}

		    		}
		    	

	    	}
	    }
    }
}
