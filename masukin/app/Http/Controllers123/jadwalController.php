<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jadwal;
use App\Cabor;
use App\Fakultas;

class jadwalController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $jadwal = Jadwal::orderBy('tanggal_pertandingan','asc')->join('omi_cabang_olahraga', 'omi_cabang_olahraga.id_cabor', '=', 'omi_pertandingan.id_cabor')->get();
        $fakultas = Fakultas::orderBy('id_fakultas')->get();
        $cabor = Cabor::orderBy('nama_cabor','asc')->get();
        return view('jadwal/jadwal-list',['jadwal'=>$jadwal, 'fakultas'=>$fakultas, 'cabor'=>$cabor]);
    }
    public function add()
    {
        $cabor = Cabor::orderBy('nama_cabor','asc')->get();
        $fakultas = Fakultas::orderBy('id_fakultas','asc')->get();
        return view('jadwal/jadwal-tambah', ['cabor'=>$cabor, 'fakultas'=>$fakultas]);
    }
    public function post(Request $data)
    {

         $validation = Validator::make($data->all(), array(
            'cabangOlahraga'=>'required',
            'tanggal'=>'required',
            'tempat'=>'required',
            'waktu'=>'required',
           // 'babak'=>'required',
            ));
        if ($validation -> fails()) 
        {
            return back()->withErrors($validation)->withInput();
            //return Redirect::to('jadwal/tambah')->withErrors($validation);
        }
        else
        { 
            $timestamp = $data->input('tanggal')." ".$data->input('waktu');
            $table = new Jadwal;
            $table->id_cabor = $data->input('cabangOlahraga');
            $table->tanggal_pertandingan = $timestamp;
            $table->tempat_pertandingan = $data->input('tempat');
            if($data->input('fakultasA')!="0") $table->fakultasA = $data->input('fakultasA');
            if($data->input('fakultasB')!="0") $table->fakultasB = $data->input('fakultasB');
            if($data->input('fakultasC')!="0") $table->fakultasC = $data->input('fakultasC');
            if($data->input('fakultasD')!="0") $table->fakultasD = $data->input('fakultasD');
            $table->babak_pertandingan = $data->input('babak');
            $table->status = "0";
            $table->save();
            return Redirect::to('jadwal');
        }
        
    }
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        $cabor = Cabor::orderBy('nama_cabor','asc')->get();
        $fakultas = Fakultas::orderBy('id_fakultas','asc')->get();
        return view('jadwal/jadwal-edit', ['cabor'=>$cabor, 'fakultas'=>$fakultas, 'jadwal'=>$jadwal]);
    }
    public function update(Request $data)
    {
         $validation = Validator::make($data->all(), array(
            'cabangOlahraga'=>'required',
            'tanggal'=>'required',
            'tempat'=>'required',
            'waktu'=>'required',
           // 'babak'=>'required',
            ));
        if ($validation -> fails()) 
        {
            return back()->withErrors($validation);
           // return Redirect::to('cabor/jadwal/edit/'.$data->input('idPertandingan'))->withErrors($validation);
        }
        else
        { 
            $timestamp = $data->input('tanggal')." ".$data->input('waktu');
            $update = Jadwal::find($data->input('idPertandingan'));
            $update->id_cabor = $data->input('cabangOlahraga');
            $update->tanggal_pertandingan = $timestamp;
            $update->tempat_pertandingan = $data->input('tempat');
            $update->status = $data->input('status');
            if($data->input('fakultasA')!="0") $update->fakultasA = $data->input('fakultasA');
            if($data->input('fakultasB')!="0") $update->fakultasB = $data->input('fakultasB');
            if($data->input('fakultasC')!="0") $update->fakultasC = $data->input('fakultasC');
            if($data->input('fakultasD')!="0") $update->fakultasD = $data->input('fakultasD');
            $update->babak_pertandingan = $data->input('babak');
            $update->save();
            //return Redirect('cabor/'.$data->input('cabangOlahraga'));
            return Redirect('jadwal');
        }
    }
    public function delete($id)
    {
        Jadwal::where('id_pertandingan',$id)->delete();
        return back();
    }
}
