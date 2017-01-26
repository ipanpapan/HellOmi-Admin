<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cabor;
use App\Fakultas;
use App\KlasemenGroup;


class klasemenGroupController extends Controller
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
        $cabor = Cabor::orderBy('nama_cabor','asc')->where('id_cabor','1')->orwhere('id_cabor','2')->orwhere('id_cabor','3')->orwhere('id_cabor','4')->orwhere('id_cabor','7')->orwhere('id_cabor','9')->orwhere('id_cabor','10')->get();
        return view('group/group', ['cabor'=>$cabor, 'id'=>$id]);
    }
    public function pilih(Request $data)
    {
        $id = $data->input('cabor');
        return Redirect::to('/klasemen-group/'.$id);
    }
    public function klasemen($id)
    {
        if ($id && $id!="0") 
        {
            $namaCabor = Cabor::find($id);
            $cabor = Cabor::orderBy('nama_cabor','asc')->where('id_cabor','1')->orwhere('id_cabor','2')->orwhere('id_cabor','3')->orwhere('id_cabor','4')->orwhere('id_cabor','7')->orwhere('id_cabor','9')->orwhere('id_cabor','10')->get();
            $groupA = KlasemenGroup::orderBy('poin_klasemen','desc')->where('nama_grup','A')->where('id_cabor',$id)->get();
            $groupB = KlasemenGroup::orderBy('poin_klasemen','desc')->where('nama_grup','B')->where('id_cabor',$id)->get();
            $groupC = KlasemenGroup::orderBy('poin_klasemen','desc')->where('nama_grup','C')->where('id_cabor',$id)->get();
            if ($id == '1' || $id == '2') {
                $groupD = KlasemenGroup::orderBy('poin_klasemen','desc')->where('nama_grup','D')->where('id_cabor',$id)->get();
                return view('group/group', ['namaCabor'=>$namaCabor, 'cabor'=>$cabor, 'id'=>$id, 'groupA'=>$groupA,'groupB'=>$groupB,'groupC'=>$groupC,'groupD'=>$groupD]);
            }
            else 
            {
                return view('group/group', ['namaCabor'=>$namaCabor, 'cabor'=>$cabor, 'id'=>$id, 'groupA'=>$groupA,'groupB'=>$groupB,'groupC'=>$groupC]);
            }
        }
        else
        {
            return Redirect::to('/klasemen-group/');
        }
    }
    public function edit($id)
    {
        $data = KlasemenGroup::find($id);
        return view('group/group-edit', compact('data'));
    }
    public function update(Request $data)
    {
        $update = KlasemenGroup::find($data->input('id_klasemen'));
        $update->nama_grup = $data->input('nama_group');
        $update->win_klasemen = $data->input('win_klasemen');
        $update->draw_klasemen = $data->input('draw_klasemen');
        $update->lose_klasemen = $data->input('lose_klasemen');
        $update->poin_klasemen = ((int)$data->input('win_klasemen') * 3)+(int)$data->input('draw_klasemen');
        $update->save();
        return Redirect('klasemen-group/'.$update->id_cabor);
    }
    public function delete($id)
    {
        KlasemenGroup::where('id_klasemen',$id)->delete();
        return back();
    }
    public function add()
    {
        $cabor = Cabor::orderBy('nama_cabor','asc')->where('id_cabor','1')->orwhere('id_cabor','2')->orwhere('id_cabor','3')->orwhere('id_cabor','4')->orwhere('id_cabor','7')->orwhere('id_cabor','9')->orwhere('id_cabor','10')->get();
        $fakultas = Fakultas::orderBy('id_fakultas','asc')->get();
        return view('group/group-tambah',['fakultas'=>$fakultas, 'cabor'=>$cabor]);
    }
    public function post(Request $data)
    {
        $post = new KlasemenGroup;
        $post->nama_grup = $data->input('nama_group');
        $post->id_cabor = $data->input('id_cabor');
        $post->id_fakultas = $data->input('id_fakultas');
        $post->win_klasemen = $data->input('win_klasemen');
        $post->draw_klasemen = $data->input('draw_klasemen');
        $post->lose_klasemen = $data->input('lose_klasemen');
        $post->poin_klasemen = ((int)$data->input('win_klasemen') * 3)+(int)$data->input('draw_klasemen');
        $post->save();
        return Redirect('klasemen-group/'.$data->id_cabor);
    }
}
