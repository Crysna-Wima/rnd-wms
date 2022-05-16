<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class stockstatusController extends Controller
{
    public function index(){
        $stockstatus = DB::table('m_stock_status')->get();
        return view('dashboard.master.stockstatus.stockstatus')->with('stockstatus', $stockstatus);
    }

    public function store(Request $request){
        $request ->validate([
            'code' => 'required|max:2',
            'name' => 'required|max:50',
        ]);

        DB::table('m_stock_status')->insert([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
            'description' => $request->description,
        ]);
        return redirect('/stockstatus')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($id){
        $stockstatus = DB::table('m_stock_status')->where('id',$id)->get();
        return view('dashboard.master.stockstatus.editstockstatus',['stockstatus' => $stockstatus]);
    }

    public function update(Request $request){
        $request ->validate([
            'code' => 'required|max:2',
            'name' => 'required|max:50',
        ]);
        DB::table('m_stock_status')->where('code',$request->code)->update([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
            'description' => $request->description,
        ]);
        return redirect('/stockstatus')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_stock_status')->where('id',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/stockstatus')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($id){
        DB::table('m_stock_status')->where('id',$id)->delete();
        return redirect('/stockstatus/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($id){
        DB::table('m_stock_status')->where('id',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/stockstatus')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restorestockstatus = DB::table('m_stock_status')->where('deleted_at','!=',null)->get();
        return view('dashboard.master.stockstatus.restorestockstatus',['restorestockstatus' => $restorestockstatus]);
    }

}