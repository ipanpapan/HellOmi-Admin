<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medali;
use App\MedaliDetail;


class medaliController extends Controller
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
        $medali = Medali::orderBy('medali_total','desc')->join('omi_fakultas', 'omi_medali.id_fakultas', '=', 'omi_fakultas.id_fakultas')->get();

        return view('medali/medali', ['medali' => $medali]);
    }

    public function detail($id)
    {
        $medaliDetail = "";

        return view('medali/medali-detail', compact('medaliDetail'));
    }
    public function delete($id)
    {
        Informasi::where('id_informasi',$id)->delete();
        return back();
    }
    public function edit($id)
    {
        $informasi = Informasi::find($id);

        return view('informasi-edit', compact('informasi'));
    }
    public function tambah()
    {
        return view('informasi-tambah');
    }
    public function post(Request $data)
    {
        $validation = Validator::make($data->all(), array(
            'judul-informasi'=>'required',
            'subjek-informasi'=>'required',
            'isi-informasi'=>'required',
            'image'=>'required|mimes:jpg,jpeg|Max:500',
            ));
        if ($validation -> fails()) 
        {
            return Redirect::to('informasi/tambah')->withErrors($validation);
        }
        else
        {
            $image = $data->file('image');
            $upload = 'uploads/informasi';
            $filename = $image->getClientOriginalName();
            $success = $image->move($upload,$filename);
            if ($success) {
             
            $table = new Informasi;
            $table->judul_informasi = $data->input('judul-informasi');
            $table->subjek_informasi = $data->input('subjek-informasi');
            $table->isipanjang_informasi = $data->input('isi-informasi');
            $table->gambar_informasi = $upload.'/'.$filename;
            $table->save();
            return Redirect::to('informasi');
            }
        }
    }
    public function update(Request $data){
        $s = new Informasi;
      
        return Redirect('/');
    }

}
