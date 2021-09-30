<?php

namespace App\Http\Controllers\Mtparmada;

use App\Http\Controllers\Controller;
use App\Models\Globalfunction;
use App\Models\Mtparmada\Mtparmada;
use App\Models\Mot\Mot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MtparmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hakakses = Globalfunction::cekAkses('mtparmada');
        if($hakakses['aur']=='1'){
            $kode     = $request->post("kode") != NULL ? $request->post("kode") : "";
            $mot  = $request->post("mot") != NULL ? $request->post("mot") : "";            
            $nama       = $request->post("nama") != NULL ? $request->post("nama") : "";
            
            $param["kode"] = $kode;
            $param["mot"] = $mot;
            $param["nama"] = $nama;

            $data = Mtparmada::when($kode, function ($query, $kode) {
                        return $query->where('vtvtyp', $kode);
                    })
                    ->when($mot, function ($query, $mot) {
                        return $query->where('vtmot', $mot);
                    })
                    ->when($nama, function ($query, $nama) {
                        return $query->where('vtdesc', 'LIKE', '%' . $nama . '%');
                    })
                    ->paginate(50);
            #dd($data);
            return view('mtparmada.index', ['datas'=>$data, 'kode'=>'', 'pesan'=>'', 'param'=>$param, 'hakakses'=>$hakakses]);
        }else{            
            return redirect('/401');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hakakses = Globalfunction::cekAkses('mtparmada');
        if($hakakses['auc']=='1'){
            $mot = Mot::get();
            return view('mtparmada.create', ['mot'=>$mot]);
        }else{
            return redirect('/401');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
               'vtvtyp' => 'required',
               'vtdesc' => 'required',
               'vtmot' => 'required',
        ]);
        
        if (Mtparmada::where(['vtvtyp'=>$request->vtvtyp])->doesntExist()) { // Cek data apakah sudah ada atau belum di database 
            $request->request->add(['vtcrby'=>session::get('infoUser')[0]['username']]);
            Mtparmada::create($request->all());
            return redirect('/mtparmada')->with(['kode'=>'99', 'pesan'=>'Data berhasil disampan !']);
        }else{
            return redirect('/mtparmada')->with(['kode'=>'98','pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mot\Mot  $mtparmada
     * @return \Illuminate\Http\Response
     */
    public function show(Mtparmada $mtparmada)
    {
        $hakakses = Globalfunction::cekAkses('mtparmada');
        if($hakakses['aur']=='1'){
            $data = DB::table('mfvehitype as a')
                ->select(
                    'a.vtvtyp',
                    'a.vtdesc',
                    'a.vtmot',
                    'b.mtdesc',
                    'a.vtwuom',
                    'a.vteweight',
                    'a.vtcweight',
                    'a.vtvuom',
                    'a.vtcvolume',
                    'a.vtpuom',
                    'a.vtcpiece',
                    'a.vtnaxl',
                    'a.vtcby',
                    'a.vtcrby',
                    'a.created_at',
                    'a.vtedby',
                    'a.updated_at',
                    'a.vtdeby',
                    'a.deleted_at'
                )
                ->leftjoin('mfmot as b', 'b.mtmot', '=', 'a.vtmot') 
                ->where('a.vtvtyp', '=', $mtparmada->vtvtyp)
                ->get();
            #dd($data);
            return view('mtparmada.show',['datas'=>$data, 'hakakses'=>$hakakses]);
        }else{
            return redirect('/401');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mot\Mot  $mtparmada
     * @return \Illuminate\Http\Response
     */
    public function edit(Mtparmada $mtparmada)
    {
        $hakakses = Globalfunction::cekAkses('mtparmada');
        if($hakakses['auu']=='1'){
            $mot = Mot::get();
            return view('mtparmada.edit',['datas'=>$mtparmada, 'mot'=>$mot]);
        }else{
            return redirect('/401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mot\Mot  $mtparmada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mtparmada $mtparmada)
    {
        $request->validate([
               'vtdesc' => 'required',
               'vtmot' => 'required',
        ]);
        
        if (Mtparmada::where([
                ['vtvtyp', '=', $request->vtvtyp],
                ['vtmot', '=', $request->vtmot],
                ['vtvtyp', '!=', $mtparmada->vtvtyp]
        ])->doesntExist()) { // Cek data apakah sudah ada atau belum di database            
            Mtparmada::where('vtvtyp', $mtparmada->vtvtyp)
              ->update([
                  'vtdesc' => $request->vtdesc,
                  'vtmot' => $request->vtmot,
                  'vtwuom' => $request->vtwuom,
                  'vteweight' => $request->vteweight,
                  'vtcweight' => $request->vtcweight,
                  'vtvuom' => $request->vtvuom,
                  'vtcvolume' => $request->vtcvolume,
                  'vtpuom' => $request->vtpuom,
                  'vtcpiece' => $request->vtcpiece,
                  'vtnaxl' => $request->vtnaxl,
                  'vtcby' => $request->vtcby,
                  'vtedby'=>session::get('infoUser')[0]['username']
            ]);
            return redirect('/mtparmada')->with(['kode'=>'99', 'pesan'=>'Data berhasil diubah !']);
        }else{
            return redirect('/mtparmada')->with(['kode'=>'98', 'pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mot\Mot  $mtparmada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mtparmada $mtparmada)
    {
        $hakakses = Globalfunction::cekAkses('mtparmada');
        if($hakakses['aud']=='1'){
            Mtparmada::where('vtvtyp', $mtparmada->vtvtyp)
              ->update([
                  'vtdeby'=>session::get('infoUser')[0]['username'],                  
                  'vtdefl'=>'1'
            ]);
            Mtparmada::destroy($mtparmada->vtvtyp);
            return redirect('/mtparmada')->with(['kode'=>'90', 'pesan'=> 'Data berhasil dihapus !']);
        }else{
            return redirect('/401');
        }
    }
}
