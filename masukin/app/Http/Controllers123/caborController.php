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
use App\Hasil;

class caborController extends Controller
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

    public function index(Request $data)
    {
        $id = 0;
        $cabor = Cabor::orderBy('nama_cabor','asc')->get();
            return view('cabor/cabor', ['cabor'=>$cabor,'id'=>$id]);
        
    }   
    public function pilih(Request $data)
    {
        $id = $data->input('cabor');
        return Redirect::to('/cabor/'.$id);
    }
    public function cabor($id)
    {
        if($id==0)
        {
            return Redirect::to('/cabor');
        }
        else
        {
            $fakultas = Fakultas::orderBy('id_fakultas','asc')->get();
            $cabor = Cabor::orderBy('nama_cabor','asc')->get();
            if ($id && $id!="0") {
                $jadwal = Jadwal::orderBy('tanggal_pertandingan','asc')->join('omi_cabang_olahraga', 'omi_cabang_olahraga.id_cabor', '=', 'omi_pertandingan.id_cabor')->where('omi_pertandingan.id_cabor', '=', $id)->get();
                $hasil = Hasil::join('omi_pertandingan', 'omi_pertandingan.id_pertandingan','=','omi_hasil.id_jadwal')->where('omi_pertandingan.id_cabor', '=', $id)->get();
                return view('cabor/cabor', ['cabor'=>$cabor,'fakultas'=>$fakultas,'id'=>$id, 'result'=>$jadwal, 'hasil'=>$hasil]);
            }
            else{
                return view('cabor/cabor', ['cabor'=>$cabor,'fakultas'=>$fakultas, 'id'=>$id]);
            }  
        }
         
    }
}
