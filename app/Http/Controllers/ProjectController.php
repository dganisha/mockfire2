<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use Response;
use Config;
use App\Jsonserver\JsonServer;
use App\Project;
use App\User;
use App\Resource;
use App\Skema;
use App\Skemaopsi;
use App\Skemaopsigroup;
use App\Userproject;
use Faker\Factory as Faker;
// use Faker\Provider\id_ID\Person as Fakk;
use Auth;
use File;
use Storage;
use Validator;
use Exception;
use App\Mail\InvitedProject;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
	// Load data dari Tabel Skemaopsi

	public function loadData(Request $request)
	{
		$data = Skemaopsi::get();

		return response()->json($data);
	}

    public function invite_project(Request $request)
    {
        // return $request->all();

        /*
        # Laravel < 5.5
        # $this->validate($request, [
        #     'email' => 'required|email',
        # ]);
        */
        //Laravel >= 5.5
        $request->validate([
             'email' => 'required|email',
        ]);
        if($request->email == Auth::user()->email){
            return redirect("/project/".Auth::user()->id."/p/$request->projectid")->with('failed','Anda tidak dapat menambahkan anda sendiri');
        }
        $user = User::where('email', $request->email)->first();
        if($user == false){
            return redirect("/project/".Auth::user()->id."/p/$request->projectid")->with('failed','Email tidak terdaftar di server');
        }
        $user_project = Userproject::where('user_id',$user->id)->where('project_id',$request->projectid)->count();
        if($user_project >= 1){
            return redirect("/project/".Auth::user()->id."/p/$request->projectid")->with('failed','User sudah ada di dalam proyek');
        }else{
            if($user == TRUE){
                $project = Project::where('id', $request->projectid)->first();
                $invite = Userproject::create([
                    'user_id' => $user->id,
                    'project_id' => $request->projectid
                ]);
                $invite = Mail::to($user->email)->send(new InvitedProject($user, $project));
                if($invite == TRUE){
                    return redirect("/project/".Auth::user()->id."/p/$request->projectid")->with('success','Success invite friend');
                }else{
                    return redirect("/project/".Auth::user()->id."/p/$request->projectid")->with('failed','Something wrong when send email. but user has invited to project');
                }
            }else{
                return redirect("/project/".Auth::user()->id."/p/$request->projectid")->with('failed','Email tidak ditemukan');
            }
        }
    }

    public function add_project(Request $request) {
    	// return $request->all();

        $this->validate($request, [
            'name_project' => 'required',
        ]);

    	$name_project = $request->name_project;
    	$user_id = $request->user_id;

    	$rand_str = str_random(15);

    	$create_project = Project::create([
            'user_id' => Auth::user()->id,
            'name_project' => $name_project,
            'endpoint' => $rand_str,
        ]);

        $create_userproject = Userproject::create([
            'user_id' => Auth::user()->id,
            'project_id' => $create_project->id
        ]);

        $simpan = public_path().'/users/project/'.$name_project;
        File::makeDirectory($simpan, $mode = 0777, true, true);


        $user_project = Project::where('user_id',Auth::user()->id)->get();

        if($create_project && $create_userproject) {
        	return redirect('project/'.Auth::user()->id.'')->with('success','Success create project')->with('data_project',$user_project);
        }
    }

    public function get_project(Request $request, $id) {
        $data_project = Userproject::where('user_id', Auth::user()->id)->get();
        if($data_project == TRUE){
            return view('user.index', compact('data_project'));
        }
    }

    public function detail_project(Request $request, $id, $id_project) {
        $cari_userproject = Userproject::where('user_id', Auth::user()->id)->where('project_id', $id_project)->first();
        if($cari_userproject == TRUE){
            $data_project = Project::where('id', $cari_userproject->project_id)->first();
            if($data_project == TRUE){
                $data_resource = Resource::where('project_id', $data_project->id)->get();
                return view('user.projects', compact('data_resource', 'data_project'));
            }
        }else{
            return redirect('/project/'.Auth::user()->id)->with('failed', 'Project doesnt exists');
        }
    }

    public function edit_resource(Request $request, $id, $id_project, $id_resources) {
        $cari_userproject = Userproject::where('user_id', Auth::user()->id)->where('project_id', $id_project)->first();
        if($cari_userproject == TRUE){
            $data_project = Project::where('id', $cari_userproject->project_id)->first();
            if($data_project == TRUE){
                $data_resource = Resource::where('id', $id_resources)->first();
                if($data_resource == TRUE){
                    $data_skema = Skema::where('resource_id',$data_resource->id)->get();
                    $data_opsi = Skemaopsi::get();
                    $data_opsigroup = Skemaopsigroup::get();
                    $data_cek = Skema::where('resource_id', $data_resource->id)->where('type_schema','array')->get();
                    return view('user.edit_resource', compact('data_skema','data_project','data_resource','data_opsi','data_opsigroup','data_cek'));
                }
            }
        }else{
            return redirect('/project/'.Auth::user()->id)->with('failed', 'Project doesnt exists');
        }
    }

    public function new_resource(Request $request, $id, $id_project) {
        $cari_userproject = Userproject::where('user_id', Auth::user()->id)->where('project_id', $id_project)->first();
        if($cari_userproject == TRUE){
            $data_project = Project::where('id', $cari_userproject->project_id)->first();
            if($data_project == TRUE){
                $data_opsigroup = Skemaopsigroup::get();
                $data_opsi = Skemaopsi::get();
                return view('user.new_resource', compact('data_project','data_opsi','data_opsigroup'));
            }
        }
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
                'id' => $coy,
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
        $ud = Auth::user()->id;
        $generate = $this->generate_data($create_resource->id);
        return redirect("/project/$ud/p/$request->project_id")->with('success','new resource created !');
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
        $ud = Auth::user()->id;
        $generate = $this->generate_data($request->resource_id);
        return redirect("/project/$ud/p/$request->project_id")->with('success','the resource updated !');
    }

    public function generate_data($resource_id)
    {
        $data = Skema::where('resource_id', $resource_id)->where('parent_id','')->with('child')->select('id','name_schema','type_schema','parent_id','field')->get();
        $search_ = Resource::where('id', $resource_id)->first();
        $searchProject = Project::where('id', $search_->project_id)->first();

        $faker = Faker::create();
        $no = 1;

        $resouc = [];
        for ($i=1; $i < 51; $i++) { 
            # code...
            $ha = array();
            foreach ($data as $key) {
                $d = $key->type_schema;
                // $ha[] = ;
            
                    if($key->type_schema == 'array'){
                        // echo "<p>".$key->name_schema;
                        $oy = array();
                        foreach($key->child as $hi){
                            $f = $hi->type_schema;  
                            // echo "<li>".$hi->name_schema." : ".$faker->$f."</li></p>";
                            $oy[$hi->name_schema] = $faker->$f;
                        }    
                        $ha[$key->name_schema] = $oy;
                    }else if($key->type_schema == 'ObjectID'){
                        $ha[$key->name_schema] = $i;
                    }else{
                        $ha[$key->name_schema] = $faker->$d;
                    }
            }
            array_push($resouc, $ha);
        }
        $di_encode = json_encode([$search_->name_resource => $resouc]);

        $file = '.json';
        $destinationPath=public_path('/users/project')."/$searchProject->name_project/";
        if (!is_dir($destinationPath)) {
         mkdir($destinationPath,0777,true);  
        }
        $create = file_put_contents($destinationPath.$search_->name_resource.$file,$di_encode);
    }

    public function generate_data_backup(Request $request)
    {
    	// return $request->all();
        // require_once '/path/to/Faker/src/autoload.php';
        $ud = Auth::user()->id;
    	$data = Skema::where('resource_id',$request->resource_id)->where('parent_id','')->with('child')->select('id','name_schema','type_schema','parent_id','field')->get();
        $search_ = Resource::where('id', $request->resource_id)->first();
        if(!$search_){
            return redirect("/project/$ud/p/$request->pid")->with('failed','Resource not found');
        }
        $searchProject = Project::where('id', $search_->project_id)->first();

    	
        // $faker = Faker\Generator();
        // $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker = Faker::create();
    	$no = 1;

        // return $faker->nik();
        $resouc = [];
        for ($i=1; $i < 11; $i++) { 
            # code...
        	$ha = array();
        	foreach ($data as $key) {
        		$d = $key->type_schema;
        		// $ha[] = ;
    		
    	    		if($key->type_schema == 'array'){
    	    			// echo "<p>".$key->name_schema;
    	    			$oy = array();
    		    		foreach($key->child as $hi){
    		    			$f = $hi->type_schema;	
    		    			// echo "<li>".$hi->name_schema." : ".$faker->$f."</li></p>";
    		    			$oy[$hi->name_schema] = $faker->$f;
    		    		}    
    		    		$ha[$key->name_schema] = $oy;
    	    		}else if($key->type_schema == 'ObjectID'){
    	    			$ha[$key->name_schema] = $i;
    	    		}else{
    	    			$ha[$key->name_schema] = $faker->$d;
    	    		}
        	}
            array_push($resouc, $ha);
        }
    	$di_encode = json_encode([$search_->name_resource => $resouc]);
        // return response()->json(['result'=>true,'data'=>'success make order'],200);
        // return $di_encode;
    	$file = '.json';
	    // $destinationPath=public_path('/users/project/'.$request->endpoint.'')."/$request->nrs";
        $destinationPath=public_path('/users/project')."/$searchProject->name_project/";
        if (!is_dir($destinationPath)) {
         mkdir($destinationPath,0777,true);  
        }
        // Storage::disk('public_data')->put($destinationPath$file, $di_encode);
	    // $create  = File::put($destinationPath.$file,$di_encode);
        $create = file_put_contents($destinationPath.$search_->name_resource.$file,$di_encode);
    	// echo $di_encode;
        if($create){
            return redirect("/project/$ud/p/$request->pid")->with('success','the resource has generated, for check please click the name of your resource !');
        }else{
            return redirect("/project/$ud/p/$request->pid")->with('failed','Failed to generate data');
        }
    }

    # DO NOT USE , THIS FUNCTION NOT FIX
    public function show_json(Request $request, $uri) //$endpoint, $name_resource //$uri
    {
        // return $uri;
        $params = explode('/', $uri);
        $endpoint = $params[0];
        $name_resource = $params[1];
        // $search = $params[2];
        // return $params[2];
        // return $request->search;
        // try {
            // $path = public_path() . "/users/project/$endpoint/$name_resource.json"; // ie: /var/www/laravel/public/users/project/folderendpoint/filename.json
            $path = storage_path('/datajson')."$name_resource.json";
            if (!File::exists($path)) {
                // throw new Exception("Invalid File");
                $data = array(
                    'status' => 404,
                    'message' => "File not found!"
                );
                return json_encode($data);
            }else {
                $file = File::get($path); // string
                if(isset($params[2])) {
                    // return "haylloo";
                    $hay = json_decode($file, true);
                    // return "haylloo";
                   foreach($hay as $row){
                        if($row['id'] == $params[2]){
                            // echo '<pre>';
                            // print_r($row);
                            return json_encode(array($row));
                        }
                    }
                } else {
                    return $file;
                }
            }
        // } catch(Exception $e) {
        //     $data = array(
        //             'status' => 404,
        //             'message' => "File not found!"
        //             // 'message' => $e->getMessage()
        //         );
        //     return json_encode($data);
        //     $this->set_response($data, REST_Controller::HTTP_INTERNAL_SERVER_ERROR );
        // }
    }

    public function delete_resource(Request $request)
    {
        // return $request->all();

        Skema::where('resource_id',$request->resource_id)->delete();
        Resource::where('id',$request->resource_id)->delete();

        return redirect("/project/$request->ud/p/$request->pid")->with('success','the resource deleted !');
    }

    public function delete_resource_api(Request $request)
    {
        $search = Skema::where('resource_id', $request->resource_id)->first();
        if($search == TRUE){
            $resource = Resource::where('id', $search->resource_id)->first();
            if($resource == TRUE){
                $cari_userproject = Userproject::where('user_id', Auth::user()->id)->where('project_id', $resource->project_id)->first();
                $cari_project = Project::where('id', $cari_userproject->project_id)->first();
                if($cari_userproject == TRUE && $cari_project == TRUE){
                    // File::deleteDirectory(public_path('users/verif/').$user->id);
                    $delete_file = File::delete(public_path("users/project/$cari_project->name_project/").$resource->name_resource.".json");
                    if($delete_file == TRUE){
                        $delete = TRUE;
                        $delete = $search->delete();
                        $delete = $resource->delete();
                        if($delete == TRUE){
                            return response()->json(['result'=>true,'msg'=>"Data has been deleted"],200);
                        }else{
                            return response()->json(['result'=>false,'msg'=>"Not deleted"],500);
                        }
                    }else{
                        return response()->json(['result'=>false,'msg'=>"Not deleted. error when deleted file "],500);
                    }
                }
            }
        }
    }

    public function delete_project_api(Request $request)
    {
        // return $request->all();
        $cari_userproject = Userproject::where('user_id', Auth::user()->id)->where('project_id',$request->project_id)->first();
        if($cari_userproject == TRUE){
            $cari_project = Project::where('id', $request->project_id)->first();
            $deleteFolder = File::deleteDirectory(public_path("users/project/$cari_project->name_project"));
                if($deleteFolder == TRUE){
                    if($cari_project == TRUE){
                        $cari_resource = Resource::where('project_id', $request->project_id)->get();
                        foreach($cari_resource as $data){
                            // echo $data->name_resource;
                            $delete = Skema::where('resource_id', $data->id)->delete();
                            // foreach($cari_skema as $data_skema){
                            //     echo "<p>$data_skema->name_schema</p>";
                            // }
                        }
                        $delete = Resource::where('project_id', $request->project_id)->delete();
                        $delete = Userproject::where('project_id', $request->project_id)->delete();
                        $delete = Project::where('id', $request->project_id)->delete();
                        if($delete == TRUE){
                            return response()->json(['result'=>true,'msg'=>"Project has been deleted"],200);
                        }else{
                            return response()->json(['result'=>false,'msg'=>"Data not deleted"],500);
                        }
                    }else{
                        //error karena tidak ada project di server
                        return response()->json(['result'=>false,'msg'=>"Project doesnt exists in server"],404);
                    }
                }else{
                    return response()->json(['result'=>false,'msg'=>"Something wrong when deleted folder. ".public_path("users/project/$cari_project->name_project")],500);
                }
        }
    }

    public function handleRequest(Request $request, $project, $uri)
    {
        $data = $request->all();                          
        $db = explode('/', $uri);      
        $method = $request->method();  
        try {
            $pathToJson = public_path('users/project/'.$project.'/'.$db[0] .'.json'); //if your path in inside storage folder of laravel
            Config::set('jsonserver.pathToDb', $pathToJson); //here we set db
            // return Config::get('pathToDb');
            // return config('jsonserver.pathToDb');
            $jsonServer = new JsonServer();                                     
            $response = $jsonServer->handleRequest($method, $uri, $data);       
            $response->send();
        } catch(Exception $e) {
            $data = array(
                    'status' => 404,
                    'message' => "File not found!"
                    // 'message' => $e->getMessage()
                );
            return json_encode($data);
            $this->set_response($data, REST_Controller::HTTP_INTERNAL_SERVER_ERROR );
        }     
    }
}
