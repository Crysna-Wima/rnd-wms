<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class warehouseController extends Controller
{
    public function index(){
        $warehouse = DB::table('m_warehouse as a')
        ->select('a.*', 'b.name as name_company')
        ->join('m_company as b', 'a.company_id', '=', 'b.id')
        ->where('a.deleted_at', null)
        ->get();
        $company = DB::table('m_company')->where('deleted_at', null)->get();
        return view('dashboard.master.warehouse.warehouse',['warehouse' => $warehouse, 'company' => $company]);
    }

    public function store(Request $request){
        $request ->validate([
            'company_id' => 'required|exists:m_company,id',
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);

        DB::table('m_warehouse')->insert([
            'company_id' => $request->company_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'coordinate' => $request->coordinate,
        ]);
        return redirect('/warehouse')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $warehouse = DB::table('m_warehouse as a')
        ->select('a.*', 'b.name as name_company')
        ->join('m_company as b', 'a.company_id', '=', 'b.id')
        ->where('a.id', $id)
        ->get();
        $company = DB::table('m_company')->where('deleted_at', null)->get();
        return view('dashboard.master.warehouse.editwarehouse',['warehouse' => $warehouse, 'company' => $company]);
    }

    public function update(Request $request){
        $request ->validate([
            'company_id' => 'required|exists:m_company,id',
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);      
        DB::table('m_warehouse')->where('id', $request->id)->update([
            'company_id' => $request->company_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'coordinate' => $request->coordinate,
        ]);
        return redirect('/warehouse')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_warehouse')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/warehouse')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_warehouse')->where('id',$id)->delete();
        return redirect('/warehouse/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_warehouse')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/warehouse')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restorewarehouse = DB::table('m_warehouse as a')
        ->select('a.*', 'b.name as name_company')
        ->join('m_company as b', 'a.company_id', '=', 'b.id')
        ->where('a.deleted_at', '!=', null)
        ->get();

        return view('dashboard.master.warehouse.restorewarehouse',['restorewarehouse' => $restorewarehouse]);
    }

}