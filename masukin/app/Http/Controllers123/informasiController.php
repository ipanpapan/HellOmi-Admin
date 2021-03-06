<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Informasi;


class informasiController extends Controller
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
        $informasi = Informasi::all();

        return view('informasi/informasi', ['informasi' => $informasi]);
    }

    public function detail($id)
    {
        $informasi = Informasi::find($id);

        return view('informasi/informasi-detail', compact('informasi'));
    }
    public function delete($id)
    {
        Informasi::where('id_informasi',$id)->delete();
        return back();
    }
    public function edit($id)
    {
        $informasi = Informasi::find($id);

        return view('informasi/informasi-edit', compact('informasi'));
    }
    public function tambah()
    {
        return view('informasi/informasi-tambah');
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
            $konvert = str_replace("\r\n", '\n', $data->Input('isi-informasi'));
	    $isipendek = str_limit($konvert, 100);
            $image = $data->file('image');
            $upload = 'assets/images/informasi';
            $filename = $image->getClientOriginalName();
            $success = $image->move($upload,$filename);
            if ($success) {
             
            $table = new Informasi;
            $table->judul_informasi = $data->input('judul-informasi');
            $table->subjek_informasi = $data->input('subjek-informasi');
            $table->isipanjang_informasi = $konvert;
            $table->isipendek_informasi = $isipendek;
            $table->gambar_informasi = url('/assets/images/informasi', $filename);
            $table->save();
            return Redirect::to('informasi');
            }
        }
    }
    public function update(Request $data){
        $s = new Informasi;
	$konvert = str_replace("\r\n", '\n', $data->Input('isi-informasi'));
        $isipendek = str_limit($konvert, 100);
        $image = $data->file('image');
        if($image)
        {
            $upload = 'assets/images/informasi';
            $filename = $image->getClientOriginalName();
            $success = $image->move($upload,$filename);
            $isi = array(
                'judul_informasi' =>$data->input('judul-informasi'),
                'subjek_informasi'=>$data->input('subjek-informasi'),
                'isipanjang_informasi'=>$konvert,
                'isipendek_informasi'=>$isipendek,
                'gambar_informasi'=> url('/assets/images/informasi', $filename));
        }
        else
        {
        $isi = array(
            'judul_informasi' =>$data->input('judul-informasi'),
            'subjek_informasi'=>$data->input('subjek-informasi'),
            'isipanjang_informasi'=>$konvert,
            'isipendek_informasi'=>$isipendek);   
        }
        $s->where('id_informasi',$data->input('id_informasi'))->update($isi);
        return Redirect('informasi');
    }

}
