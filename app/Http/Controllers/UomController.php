<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class uomController extends Controller
{
    public function index(){
        $uom = DB::table('m_uom')->get();
        return view('dashboard.master.uom.uom')->with('uom', $uom);
    }

    public function store(Request $request){
        $request ->validate([
            'code' => 'required|max:5',
            'name' => 'required|max:100',
        ]);

        DB::table('m_uom')->insert([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
        ]);
        return redirect('/uom')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $uom = DB::table('m_uom')->where('id',$id)->get();
        return view('dashboard.master.uom.edituom',['uom' => $uom]);
    }

    public function update(Request $request){
        $request ->validate([
            'code' => 'required|max:5',
            'name' => 'required|max:100',
        ]);
        DB::table('m_uom')->where('id',$request->id)->update([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
        ]);
        return redirect('/uom')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_uom')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/uom')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_uom')->where('id',$id)->delete();
        return redirect('/uom/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_uom')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/uom')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restoreuom = DB::table('m_uom')->where('deleted_at','!=',null)->get();
        return view('dashboard.master.uom.restoreuom',['restoreuom' => $restoreuom]);
    }

}