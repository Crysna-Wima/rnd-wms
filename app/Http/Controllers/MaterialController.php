<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class materialController extends Controller
{
    public function index(){
        $material = DB::table('m_material as a')
        ->select('a.*', 'b.name as name_company', 'c.name as name_uom', 'd.name as name_material_group')
        ->join('m_company as b', 'a.company_id', '=', 'b.id')
        ->join('m_uom as c', 'a.uom_id', '=', 'c.id')
        ->join('m_material_group as d', 'a.material_group_id', '=', 'd.id')
        ->where('a.deleted_at', null)
        ->get();
        $company = DB::table('m_company')->where('deleted_at', null)->get();
        $uom = DB::table('m_uom')->where('deleted_at', null)->get();
        $materialgroup = DB::table('m_material_group')->where('deleted_at', null)->get();
        return view('dashboard.master.material.material',['material' => $material, 'company' => $company, 'uom' => $uom, 'material_group' => $materialgroup]);
    }

    public function store(Request $request){
        $request ->validate([
            'company_id' => 'required|exists:m_company,id',
            'int_matnumber' => 'required|max:10|unique:m_material',
            'name' => 'required|max:100',
            'uom_id' => 'required|exists:m_uom,id',
            'material_group_id' => 'required|exists:m_material_group,id',
            'long_name' => 'required',
        ]);

        DB::table('m_material')->insert([
            'company_id' => $request->company_id,
            'int_matnumber' => $request->int_matnumber,
            'ext_matnumber' => $request->ext_matnumber,
            'name' => $request->name,
            'long_name' => $request->long_name,
            'uom_id' => $request->uom_id,
            'material_group_id' => $request->material_group_id,
        ]);
        return redirect('/material')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $material = DB::table('m_material as a')
        ->select('a.*', 'b.name as name_company', 'c.name as name_uom', 'd.name as name_material_group')
        ->join('m_company as b', 'a.company_id', '=', 'b.id')
        ->join('m_uom as c', 'a.uom_id', '=', 'c.id')
        ->join('m_material_group as d', 'a.material_group_id', '=', 'd.id')
        ->where('a.id', $id)
        ->get();
        $company = DB::table('m_company')->where('deleted_at', null)->get();
        $uom = DB::table('m_uom')->where('deleted_at', null)->get();
        $materialgroup = DB::table('m_material_group')->where('deleted_at', null)->get();
        return view('dashboard.master.material.editmaterial',['material' => $material, 'company' => $company, 'uom' => $uom, 'material_group' => $materialgroup]);
    }

    public function update(Request $request){
        $request ->validate([
            'company_id' => 'required|exists:m_company,id',
            'int_matnumber' => 'required|max:10'.$request->id,
            'name' => 'required|max:100',
            'uom_id' => 'required|exists:m_uom,id',
            'material_group_id' => 'required|exists:m_material_group,id',
            'long_name' => 'required',
        ]);      
        DB::table('m_material')->where('id', $request->id)->update([
            'company_id' => $request->company_id,
            'int_matnumber' => $request->int_matnumber,
            'ext_matnumber' => $request->ext_matnumber,
            'name' => $request->name,
            'long_name' => $request->long_name,
            'uom_id' => $request->uom_id,
            'material_group_id' => $request->material_group_id,
        ]);
        return redirect('/material')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_material')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/material')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_material')->where('id',$id)->delete();
        return redirect('/material/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_material')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/material')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restorematerial = DB::table('m_material as a')
        ->select('a.*', 'b.name as name_company', 'c.name as name_uom', 'd.name as name_material_group')
        ->join('m_company as b', 'a.company_id', '=', 'b.id')
        ->join('m_uom as c', 'a.uom_id', '=', 'c.id')
        ->join('m_material_group as d', 'a.material_group_id', '=', 'd.id')
        ->where('a.deleted_at', '!=', null)
        ->get();

        return view('dashboard.master.material.restorematerial',['restorematerial' => $restorematerial]);
    }

}