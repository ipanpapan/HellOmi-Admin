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
        $informasi = Informasi::orderBy('id_informasi')->get();

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
            'image'=>'required|mimes:jpg,jpeg,png|Max:500',
            ));
        
        if ($validation -> fails()) 
        {
            return Redirect::to('informasi/tambah')->withErrors($validation);
        }
        else
        {
            $isipendek = str_limit($data->input('isi-informasi'), 100);
            $image = $data->file('image');
            $imageInfo = getimagesize($image);
            $imageWidth = $imageInfo[0];
            $imageHeight = $imageInfo[1];
            $upload = 'assets/images/informasi';
            $filename = $image->getClientOriginalName();
            $success = $image->move($upload,$filename);
            
            if ($success)
            {
                $table = new Informasi;
                $table->judul_informasi = $data->input('judul-informasi');
                $table->subjek_informasi = $data->input('subjek-informasi');
                $table->isipanjang_informasi = $data->input('isi-informasi');
                $table->isipendek_informasi = $isipendek;
                $table->imageWidth = $imageWidth;
                $table->imageHeight = $imageHeight;
                $table->gambar_informasi = $upload.'/'.$filename;
                $table->save();
                return Redirect::to('informasi');
            }
        }
    }
    public function update(Request $data)
    {
        $validation = Validator::make($data->all(), array(
            'judul-informasi'=>'required',
            'subjek-informasi'=>'required',
            'isi-informasi'=>'required',
            'image'=>'mimes:jpg,jpeg,png|Max:500',
            ));

        if ($validation -> fails()) 
        {
            return Redirect::to('informasi/edit')->withErrors($validation);
        }
        else
        {
            $s = new Informasi;
            $isipendek = str_limit($data->input('isi-informasi'), 100);
            $image = $data->file('image');
            
            if($image)
            {
                $upload = 'assets/images/informasi';
                $filename = $image->getClientOriginalName();
                $success = $image->move($upload,$filename);
                $isi = array(
                    'judul_informasi' =>$data->input('judul-informasi'),
                    'subjek_informasi'=>$data->input('subjek-informasi'),
                    'isipanjang_informasi'=>$data->input('isi-informasi'),
                    'isipendek_informasi'=>$isipendek,
                    'gambar_informasi'=>$upload.'/'.$filename);
            }
            else
            {
                $isi = array(
                    'judul_informasi' =>$data->input('judul-informasi'),
                    'subjek_informasi'=>$data->input('subjek-informasi'),
                    'isipanjang_informasi'=>$data->input('isi-informasi'),
                    'isipendek_informasi'=>$isipendek);   
            }

            $s->where('id_informasi',$data->input('id_informasi'))->update($isi);
            return Redirect('informasi');
        }
    }

}
