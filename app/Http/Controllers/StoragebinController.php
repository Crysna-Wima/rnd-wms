<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class storagebinController extends Controller
{
    public function index(){
        $storagebin = DB::table('m_storage_bin as a')
        ->select('a.*', 'b.name as name_storage_facility')
        ->join('m_storage_facility as b', 'a.storage_facility_id', '=', 'b.id')
        ->where('a.deleted_at', null)
        ->get();
        $storagefacility = DB::table('m_storage_facility')->where('deleted_at', null)->get();
        return view('dashboard.master.storagebin.storagebin',['storagebin' => $storagebin, 'storagefacility' => $storagefacility]);
    }

    public function store(Request $request){
        $request ->validate([
            'storage_facility_id' => 'required|exists:m_storage_facility,id',
            'code' => 'required|max:10|unique:m_storage_bin',
            'name' => 'required|max:100',
        ]);

        DB::table('m_storage_bin')->insert([
            'storage_facility_id' => $request->storage_facility_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/storagebin')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $storagebin = DB::table('m_storage_bin as a')
        ->select('a.*', 'b.name as name_storage_facility')
        ->join('m_storage_facility as b', 'a.storage_facility_id', '=', 'b.id')
        ->where('a.id', $id)
        ->get();
        $storagefacility = DB::table('m_storage_facility')->where('deleted_at', null)->get();
        return view('dashboard.master.storagebin.editstoragebin',['storagebin' => $storagebin, 'storagefacility' => $storagefacility]);
    }

    public function update(Request $request){
        $request ->validate([
            'storage_facility_id' => 'required|exists:m_storage_facility,id',
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);
        DB::table('m_storage_bin')->where('code',$request->code)->update([
            'storage_facility_id' => $request->storage_facility_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/storagebin')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_storage_bin')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/storagebin')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_storage_bin')->where('id',$id)->delete();
        return redirect('/storagebin/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_storage_bin')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/storagebin')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restorestoragebin = DB::table('m_storage_bin as a')
        ->select('a.*', 'b.name as name_storage_facility')
        ->join('m_storage_facility as b', 'a.storage_facility_id', '=', 'b.id')
        ->where('a.deleted_at', '!=', null)
        ->get();
        $storagefacility = DB::table('m_storage_facility')->where('deleted_at', null)->get();
        return view('dashboard.master.storagebin.restorestoragebin',['restorestoragebin' => $restorestoragebin, 'storagefacility' => $storagefacility]);
    }

}