<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Resource;
use App\Skemaopsi;
use App\Skemaopsigroup;
use Validator;

class AdminController extends Controller
{
    public function get_data_opsi()
    {
        $data = Skemaopsi::with('Skemaopsigroup')->select('skemaopsigroup_id','id','name_opsi','value_opsi')->get();
        return view('admin.data', compact('data'));
    }

    public function user_show()
    {
        $data_user = User::orderBy('id','ASC')->get();
        return view('admin.users', compact('data_user'));
    }

    public function delete_user(Request $request)
    {
        // return $request->all();
        $request->validate([
             'ud' => 'required|numeric',
        ]);
        $user = User::where('id',$request->ud)->delete();
        return redirect('admin/users')->with('success','The user deleted with all his/her project !');

    }

    public function project_show()
    {
    	$data_project = Project::with('user')->select('user_id','id','name_project','created_at','endpoint')->orderBy('id','ASC')->get();
    	return view('admin.projects', compact('data_project'));
    }

    public function delete_project(Request $request)
    {
    	// return $request->all();
        $request->validate([
             'idp' => 'required|numeric',
        ]);

    	$project = Project::where('id',$request->idp)->delete();
    	return redirect('admin/projects')->with('success','The project deleted with resource and skema !');

    }

    public function resource_show(Request $request, $id_project)
    {
    	$data_resource = Resource::where('project_id',$id_project)->get();
    	return view('admin.resources', compact('data_resource'));
    }

    public function add_data()
    {
        $data_opsigroup = Skemaopsigroup::get();
        return view('admin.data_add', compact('data_opsigroup'));
    }

    public function add_data_proses(Request $request)
    {
        // return $request->all();
        $request->validate([
             'category' => 'required|numeric',
             'valuedata' => 'required',
             'namedata' => 'required'
        ]);
        $addData = Skemaopsi::create([
                        'skemaopsigroup_id' => $request->category,
                        'name_opsi' => $request->valuedata,
                        'value_opsi' => $request->namedata
                    ]);
        if($addData){
            return redirect('/admin/data_opsi')->with('success', "Berhasil tambah data $request->namedata");
        }else{
            return redirect('/admin/data_opsi')->with('failed', 'Gagal menambah data');
        }
    }

    public function edit_data($id)
    {
        $data_opsigroup = Skemaopsigroup::get();
        $data_opsi = Skemaopsi::where('id', $id)->first();
        return view('admin.data_edit', compact('data_opsi','data_opsigroup'));
    }

    public function edit_data_proses(Request $request)
    {
        // return $request->all();
        $request->validate([
             'category' => 'required|numeric',
             'valuedata' => 'required',
             'namedata' => 'required'
        ]);
        $updateData = Skemaopsi::where('id', $request->id)->update([
                'skemaopsigroup_id' => $request->category,
                'name_opsi' => $request->valuedata,
                'value_opsi' => $request->namedata
            ]);
        if($updateData){
            return redirect('/admin/data_opsi')->with('success', "Data $request->namedata berhasil diupdate");
        }else{
            return redirect('/admin/data_opsi')->with('failed', 'Gagal update data');
        }
    }

    public function category_show()
    {
        $data_category = Skemaopsigroup::get();
        return view('admin.category', compact('data_category'));
    }

    public function add_category()
    {
        return view('admin.category_add');
    }

    public function add_category_proses(Request $request)
    {
        $request->validate([
             'namec' => 'required',
        ]);

        $addData = Skemaopsigroup::create([ 'option_grup' => $request->namec ]);
        if($addData){
           return redirect('/admin/data_category')->with('success', "Data berhasil menambah kategori $request->namec");
        }else{
            return redirect('/admin/data_category')->with('failed', 'Gagal tambah kategori');
        }
    }

    public function edit_category($id)
    {
        $data_category = Skemaopsigroup::where('id', $id)->first();
        return view('admin.category_edit', compact('data_category'));
    }

    public function edit_category_proses(Request $request)
    {
        // return $request->all();
        $request->validate([
             'namec' => 'required',
             'id' => 'required|numeric'
        ]);

        $updateData = Skemaopsigroup::where('id', $request->id)->update([ 'option_grup' => $request->namec ]);
        if($updateData){
            return redirect('/admin/data_category')->with('success', "Data $request->namec berhasil diupdate");
        }else{
            return redirect('/admin/data_category')->with('failed', 'Gagal update data');
        }
    }
}
