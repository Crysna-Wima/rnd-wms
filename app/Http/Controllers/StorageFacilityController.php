<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class storagefacilityController extends Controller
{
    public function index(){
        $storagefacility = DB::table('m_storage_facility as a')
        ->select('a.*', 'b.name as name_warehouse')
        ->join('m_warehouse as b', 'a.warehouse_id', '=', 'b.id')
        ->where('a.deleted_at', null)
        ->get();
        $warehouse = DB::table('m_warehouse')->where('deleted_at', null)->get();
        return view('dashboard.master.storagefacility.storagefacility',['storagefacility' => $storagefacility, 'warehouse' => $warehouse]);
    }

    public function store(Request $request){
        $request ->validate([
            'warehouse_id' => 'required|exists:m_warehouse,id',
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);

        DB::table('m_storage_facility')->insert([
            'warehouse_id' => $request->warehouse_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/storagefacility')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $storagefacility = DB::table('m_storage_facility as a')
        ->select('a.*', 'b.name as name_warehouse')
        ->join('m_warehouse as b', 'a.warehouse_id', '=', 'b.id')
        ->where('a.id', $id)
        ->get();
        $warehouse = DB::table('m_warehouse')->where('deleted_at', null)->get();
        return view('dashboard.master.storagefacility.editstoragefacility',['storagefacility' => $storagefacility, 'warehouse' => $warehouse]);
    }

    public function update(Request $request){
        $request ->validate([
            'warehouse_id' => 'required|exists:m_warehouse,id',
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);      
        DB::table('m_storage_facility')->where('id', $request->id)->update([
            'warehouse_id' => $request->warehouse_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/storagefacility')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_storage_facility')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/storagefacility')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_storage_facility')->where('id',$id)->delete();
        return redirect('/storagefacility/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_storage_facility')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/storagefacility')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restorestoragefacility = DB::table('m_storage_facility as a')
        ->select('a.*', 'b.name as name_warehouse')
        ->join('m_warehouse as b', 'a.warehouse_id', '=', 'b.id')
        ->where('a.deleted_at', '!=', null)
        ->get();

        return view('dashboard.master.storagefacility.restorestoragefacility',['restorestoragefacility' => $restorestoragefacility]);
    }

}