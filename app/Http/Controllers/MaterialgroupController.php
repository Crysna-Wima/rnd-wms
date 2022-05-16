<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class materialgroupController extends Controller
{
    public function index(){
        $materialgroup = DB::table('m_material_group')->get();
        return view('dashboard.master.materialgroup.materialgroup')->with('materialgroup', $materialgroup);
    }

    public function store(Request $request){
        $request ->validate([
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);

        DB::table('m_material_group')->insert([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
        ]);
        return redirect('/materialgroup')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $materialgroup = DB::table('m_material_group')->where('id',$id)->get();
        return view('dashboard.master.materialgroup.editmaterialgroup',['materialgroup' => $materialgroup]);
    }

    public function update(Request $request){
        $request ->validate([
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);
        DB::table('m_material_group')->where('code',$request->code)->update([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
        ]);
        return redirect('/materialgroup')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_material_group')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/materialgroup')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_material_group')->where('id',$id)->delete();
        return redirect('/materialgroup/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_material_group')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/materialgroup')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restorematerialgroup = DB::table('m_material_group')->where('deleted_at','!=',null)->get();
        return view('dashboard.master.materialgroup.restorematerialgroup',['restorematerialgroup' => $restorematerialgroup]);
    }

}