<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fakultas;
use App\Sejarah;

class SejarahController extends Controller
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
        $id=0;
        $sejarah = Sejarah::orderby('omi_sejarah.id_fakultas', 'asc')->join('omi_fakultas', 'omi_fakultas.id_fakultas', '=', 'omi_sejarah.id_fakultas')->get();
        return view('sejarah/sejarah',['sejarah'=>$sejarah, 'id'=>$id]);
    }
    public function pilih($id)
    {
        $sejarah = Sejarah::orderby('omi_sejarah.id_fakultas', 'asc')->join('omi_fakultas', 'omi_fakultas.id_fakultas', '=', 'omi_sejarah.id_fakultas')->get();
        $pilih = Sejarah::orderby('omi_sejarah.id_fakultas', 'asc')->join('omi_fakultas', 'omi_fakultas.id_fakultas', '=', 'omi_sejarah.id_fakultas')->where('id_sejarah',$id)->get();
        return view('sejarah/sejarah',['sejarah'=>$sejarah, 'pilih'=>$pilih, 'id'=>$id]);
    }
    public function edit($id)
    {
        $sejarah = Sejarah::find($id)
                        ->join('omi_fakultas', 'omi_fakultas.id_fakultas', '=', 'omi_sejarah.id_fakultas')->where('id_sejarah',$id)->first();
        return view('sejarah/sejarah-edit',compact('sejarah'));
    }
    public function update(Request $data)
    {
        $sejarah = Sejarah::find($data->input('id_sejarah'));
        $sejarah->suporter_fakultas = $data->input('nama_suporter');
        $sejarah->sejarah_lengkap = $data->input('sejarah_lengkap');
        $sejarah->save();
        return Redirect('sejarah/'.$data->input('id_sejarah'));

    }
}
