<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Medali;
use App\CabangOlahraga;
use App\MedaliDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use DB;

class medaliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cabor = DB::table('omi_cabang_olahraga')
        			->select('id_cabor', 'nama_cabor')
        			->get();

        $fakultas = Medali::join('omi_fakultas', 'omi_fakultas.id_fakultas', '=', 'omi_medali.id_fakultas')
                    ->select('nama_fakultas', 'medali_emas', 'medali_perak', 'medali_perunggu', 'medali_total')
                    ->get();

        return view('medali', compact('cabor', 'fakultas'));
    }

    public function detail(Request $data)
    {
        $passbek = $data->Input('cabor');
        $cabor1 = DB::table('omi_cabang_olahraga')
                    ->select('id_cabor', 'nama_cabor')
                    ->get();

        $fakultas1 = DB::table('omi_fakultas')
                        ->select('id_fakultas', 'singkatan')
                        ->get();

        $fakultas2 = DB::table('omi_fakultas')
                        ->select('id_fakultas', 'singkatan')
                        ->get();

        $fakultas3 = DB::table('omi_fakultas')
                        ->select('id_fakultas', 'singkatan')
                        ->get();


        return view('medali-detail', compact('passbek', 'cabor1', 'fakultas1', 'fakultas2', 'fakultas3'));
    }

    public function post(Request $data)
    {
        $konvert1 = str_replace("\r\n", '\n', $data->Input('nama-atlet-emas'));
        $konvert2 = str_replace("\r\n", '\n', $data->Input('nama-atlet-perak'));
        $konvert3 = str_replace("\r\n", '\n', $data->Input('nama-atlet-perunggu'));

        $masukan0 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                ->where('medali', 1 )
                                ->first();

        if ($data->Input('emas') != $masukan0->id_fakultas)
        {
            $masukan1 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                    ->where('medali', 1 )
                                    ->update(['id_fakultas' => $data->Input('emas')]);

            $medali_ambil_data = Medali::find($data->Input('emas'));
            $medali_ambil_emas = $medali_ambil_data->medali_emas;
            $medali_nambah_emas = $medali_ambil_emas + 1;

            $medali_ambil_total = $medali_ambil_data->medali_total;
            $medali_ambil_total = $medali_ambil_total + 100;
            $medali_ambil_data->medali_emas = $medali_nambah_emas;
            $medali_ambil_data->medali_total = $medali_ambil_total;
            $medali_ambil_data->save();
        }

        $masukan1_2 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                    ->where('medali', 1 )
                                    ->update(['detail' => $konvert1]);

        // done1

        $masukan4 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                ->where('medali', 2)
                                ->first();

        if ($data->Input('perak') != $masukan4->id_fakultas)
        {
            $masukan2 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                    ->where('medali', 2)
                                    ->update(['id_fakultas' => $data->Input('perak')]);

            $medali_ambil_data_2 = Medali::find($data->Input('perak'));
            $medali_ambil_perak_2 = $medali_ambil_data_2->medali_perak;
            $medali_nambah_perak_2 = $medali_ambil_perak_2 + 1;

            $medali_ambil_total_2 = $medali_ambil_data_2->medali_total;
            $medali_ambil_total_2 = $medali_ambil_total_2 + 10;
            $medali_ambil_data_2->medali_perak = $medali_nambah_perak_2;
            $medali_ambil_data_2->medali_total = $medali_ambil_total_2;
            $medali_ambil_data_2->save();
        }

        $masukan2_2 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                    ->where('medali', 1 )
                                    ->update(['detail' => $konvert2]);

        // done 2

        $masukan5 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                ->where('medali', 3)
                                ->first();

        if ($data->Input('perunggu') != $masukan5->id_fakultas)
        {
            $masukan2 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                    ->where('medali', 3)
                                    ->update(['id_fakultas' => $data->Input('perunggu')]);

            $medali_ambil_data_3 = Medali::find($data->Input('perunggu'));
            $medali_ambil_perunggu_3 = $medali_ambil_data_3->medali_perunggu;
            $medali_nambah_perunggu_3 = $medali_ambil_perunggu_3 + 1;

            $medali_ambil_total_3 = $medali_ambil_data_3->medali_total;
            $medali_ambil_total_3 = $medali_ambil_total_3 + 1;
            $medali_ambil_data_3->medali_perunggu = $medali_nambah_perunggu_3;
            $medali_ambil_data_3->medali_total = $medali_ambil_total_3;
            $medali_ambil_data_3->save();
        }

        $masukan3_2 = MedaliDetail::where('id_cabang_or', $data->Input('cabor'))
                                ->where('medali', 3 )
                                ->update(['detail' => $konvert3]);

        $hasil = Medali::all();

        foreach ($hasil as $hasil)
        {
            $emas1 = $hasil->medali_emas;
            $emas1_2 = $emas1 * 100;

            $perak1 = $hasil->medali_perak;
            $perak1_2 = $perak1 * 10;

            $perunggu1 = $hasil->medali_perunggu;

            $total = $emas1_2 + $perak1_2 + $perunggu1;

            $hasil->medali_total = $total;
            $hasil->save();
        }

        return Redirect('/medali/')->with('success', 'Data berhasil dimasukkan');
    }
}
