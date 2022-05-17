<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class movementController extends Controller
{
    public function index(){
        $movement = DB::table('m_movement')->get();
        return view('dashboard.master.movement.movement')->with('movement', $movement);
    }

    public function store(Request $request){
        $request ->validate([
            'code' => 'required|max:4',
            'name' => 'required|max:30',
        ]);

        DB::table('m_movement')->insert([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
            'description' => $request->description,
        ]);
        return redirect('/movement')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function edit($code){
        $movement = DB::table('m_movement')->where('code',$code)->get();
        return view('dashboard.master.movement.editmovement',['movement' => $movement]);
    }

    public function update(Request $request){
        $request ->validate([
            'code' => 'required|max:4',
            'name' => 'required|max:30',
        ]);
        DB::table('m_movement')->where('code',$request->code)->update([
            'code' => strtoupper($request->code),
            'name' => ucwords(strtolower($request->name)),
            'description' => $request->description,
        ]);
        return redirect('/movement')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function delete($code){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('m_movement')->where('code',$code)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/movement')->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function deletepermanen($code){
        DB::table('m_movement')->where('code',$code)->delete();
        return redirect('/movement/restore')->with('toast_success', 'Data Berhasil Dihapus Permanen!');
    }

    public function back($code){
        DB::table('m_movement')->where('code',$code)->update([
            'deleted_at' => null
        ]);

        return redirect('/movement')->with('toast_success', 'Data Berhasil Dipulihkan!');
    }

    public function restore(){
        $restoremovement = DB::table('m_movement')->where('deleted_at','!=',null)->get();
        return view('dashboard.master.movement.restoremovement',['restoremovement' => $restoremovement]);
    }

}