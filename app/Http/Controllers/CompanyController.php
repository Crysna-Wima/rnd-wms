<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class companyController extends Controller
{
    public function index(){
        $company = DB::table('m_company')->get();
        return view('dashboard.master.company.company')->with('company', $company);
    }

    public function store(Request $request){
        $request ->validate([
            'code' => 'required|max:10|unique:m_company',
            'name' => 'required|max:100',
        ]);

        DB::table('m_company')->insert([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
            'description' => $request->description,
            'address' => $request->address,
        ]);
        return redirect('/company')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $company = DB::table('m_company')->where('id',$id)->get();
        return view('dashboard.master.company.editcompany',['company' => $company]);
    }

    public function update(Request $request){
        $request ->validate([
            'code' => 'required|max:10',
            'name' => 'required|max:100',
        ]);
        DB::table('m_company')->where('code',$request->code)->update([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
            'description' => $request->description,
            'address' => $request->address,
        ]);
        return redirect('/company')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_company')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/company')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_company')->where('id',$id)->delete();
        return redirect('/company/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_company')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/company')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restorecompany = DB::table('m_company')->where('deleted_at','!=',null)->get();
        return view('dashboard.master.company.restorecompany',['restorecompany' => $restorecompany]);
    }

}