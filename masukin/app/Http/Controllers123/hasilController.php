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
use App\Atletik;
use App\Knockout;

class hasilController extends Controller
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
        $hasil = Hasil::join('omi_pertandingan', 'omi_pertandingan.id_pertandingan','=','omi_hasil.id_jadwal')->join('omi_cabang_olahraga', 'omi_cabang_olahraga.id_cabor', '=', 'omi_pertandingan.id_cabor')->get();
        return view('hasil/hasil-list', ['hasil'=>$hasil]);
    }   

    public function add($id)
    {
        $jadwal = Jadwal::join('omi_cabang_olahraga', 'omi_cabang_olahraga.id_cabor', '=', 'omi_pertandingan.id_cabor')->where('omi_pertandingan.id_pertandingan',$id)->first();
        $fakultas = Fakultas::orderBy('id_fakultas')->get();
        $id = $jadwal->id_cabor;
        if ($id==11 || $id==12 || $id==13 || $id==15 || $id==16 || $id==17 || $id==18 || $id==19 || $id==20 || $id==21 || $id==22) {
            
            return view('hasil/hasilWaktu-tambah', ['fakultas'=>$fakultas, 'jadwal'=>$jadwal]); 
        }
        else
            return view('hasil/hasil-tambah', compact('jadwal'));
    }
    public function post(Request $data)
    {
        $s = new Hasil;
        $s->id_jadwal = $data->input('idPertandingan');
        $s->resultA = $data->input('hasilA');
        $s->resultB = $data->input('hasilB');
        $s->detail = $data->input('detail');
        $s->save();
        $a = Jadwal::find($data->input('idPertandingan'));
        $a->status = "1";
        $a->save();
        return Redirect::to('/cabor/'.$data->input('idCabor'));
    }
    public function edit($id)
    {

        $hasil = Hasil::find($id);
        $jadwal = Jadwal::find($hasil->id_jadwal);
        return view('hasil/hasil-edit', ['jadwal'=>$jadwal,'hasil'=>$hasil]);
    }
    public function update(Request $data)
    {
        $s = Hasil::find($data->input('idHasil'));
        //$s->id_jadwal = $data->input('idPertandingan');
        $s->resultA = $data->input('hasilA');
        $s->resultB = $data->input('hasilB');
        $s->detail = $data->input('detail');
        $s->save();
        return Redirect::to('/cabor/'.$data->input('idCabor'));
    }
    public function delete($id)
    {
        Hasil::where('id_hasil',$id)->delete();
        return back();
    }
    public function knockout()
    {
        $data = Knockout::join('omi_cabang_olahraga', 'omi_cabang_olahraga.id_cabor', '=', 'omi_hasil_knockout.id_cabor')->get();
        return view('knockout/knockout',['data'=>$data]);
    }
    public function postKnockout(Request $data)
    {
        $u = Knockout::find($data->input('id'));
        $u->babak = $data->input('babak');
        $image = $data->file('image');
        if($image)
        {
            $upload = 'assets/images/knockout';
            $filename = $image->getClientOriginalName();
            $success = $image->move($upload,$filename);
            $u->gambar = url('/assets/images/knockout', $filename);
        }
        $u->save();
        return Redirect('knockout');
    }
    public function waktu(Request $data)
    {
        $fakultas = Fakultas::orderBy('id_fakultas')->get();
        foreach ($fakultas as $fakultas){ 
            $s = new Atletik;
            $s->id_cabor = $data->input('idCabor');
            $s->id_fakultas = $fakultas->id_fakultas;
            $s->waktu = $data->input($fakultas->id_fakultas);
            $s->save();
        }
        $a = Jadwal::find($data->input('idPertandingan'));
        $a->status = "1";
        $a->save();
        echo "sukses";
        //return view('hasil/hasilWaktu-tambah', ['fakultas'=>$fakultas, 'id'=>$id, 'cabor'=>$cabor]);
    }

}