<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cabor;
use App\Fakultas;
use App\Atletik;

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
        $cabor = Cabor::orderBy('nama_cabor','asc')
                ->orwhere(function($query){
                    $query->where('id_cabor', '>', '10')->where('id_cabor', '<', '14'); })
                ->orwhere(function($query){
                    $query->where('id_cabor','>', '14')->where('id_cabor','<','23'); }) 
                ->get();
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
            $edit=0;
            $cabor = Cabor::orderBy('nama_cabor','asc')
                ->orwhere(function($query){
                    $query->where('id_cabor', '>', '10')->where('id_cabor', '<', '14'); })
                ->orwhere(function($query){
                    $query->where('id_cabor','>', '14')->where('id_cabor','<','23'); }) 
                ->get();
            if ($id && $id!="0") {
                $result = Atletik::join('omi_fakultas', 'omi_fakultas.id_fakultas', '=', 'omi_hasil_waktu.id_fakultas')
                        ->join('omi_cabang_olahraga','omi_cabang_olahraga.id_cabor','=','omi_hasil_waktu.id_cabor')
                        ->where('omi_hasil_waktu.id_cabor',$id)->get();
                return view('cabor/cabor', ['cabor'=>$cabor,'id'=>$id, 'edit'=>$edit, 'result'=>$result]);
            }
            else{
                return view('cabor/cabor', ['cabor'=>$cabor, 'id'=>$id]);
            }  
        }
         
    }
    public function edit($id)
    {   
        $edit=1;
        $cabor = Cabor::orderBy('nama_cabor','asc')
            ->orwhere(function($query){
                $query->where('id_cabor', '>', '10')->where('id_cabor', '<', '14'); })
            ->orwhere(function($query){
                $query->where('id_cabor','>', '14')->where('id_cabor','<','23'); }) 
            ->get();

        $result = Atletik::join('omi_fakultas', 'omi_fakultas.id_fakultas', '=', 'omi_hasil_waktu.id_fakultas')
                ->join('omi_cabang_olahraga','omi_cabang_olahraga.id_cabor','=','omi_hasil_waktu.id_cabor')
                ->where('omi_hasil_waktu.id_cabor',$id)->get();
        return view('cabor/cabor', ['cabor'=>$cabor,'id'=>$id, 'edit'=>$edit, 'result'=>$result]); 
    }
}
