<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transtypeController extends Controller
{
    public function index(){
        $transtypes = DB::table('m_transtype')->get();
        return view('dashboard.master.transtype.transtype')->with('transtype', $transtypes);
    }

    public function store(Request $request){
        $request ->validate([
            'code' => 'required|max:2',
            'name' => 'required|max:30',
        ]);

        DB::table('m_transtype')->insert([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
        ]);
        return redirect('/transtype')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($code){
        $transtype = DB::table('m_transtype')->where('code',$code)->get();
        return view('dashboard.master.transtype.edittranstype',['transtype' => $transtype]);
    }

    public function update(Request $request){
        $request ->validate([
            'code' => 'required|max:2',
            'name' => 'required|max:30',
        ]);
        DB::table('m_transtype')->where('code',$request->code)->update([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
        ]);
        return redirect('/transtype')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($code){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_transtype')->where('code',$code)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/transtype')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($code){
        DB::table('m_transtype')->where('code',$code)->delete();
        return redirect('/transtype/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($code){
        DB::table('m_transtype')->where('code',$code)->update([
            'deleted_at' => null
        ]);

        return redirect('/transtype')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restoretranstype = DB::table('m_transtype')->where('deleted_at','!=',null)->get();
        return view('dashboard.master.transtype.restoretranstype',['restoretranstype' => $restoretranstype]);
    }

}