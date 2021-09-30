<?php

namespace App\Http\Controllers\Marmada;

use App\Http\Controllers\Controller;
use App\Models\Globalfunction;
use App\Models\Marmada\Marmada;
use App\Models\Mtparmada\Mtparmada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MarmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hakakses = Globalfunction::cekAkses('marmada');
        if($hakakses['aur']=='1'){
            $kode = $request->post("kode") != NULL ? $request->post("kode") : "";
            $mtp  = $request->post("mtp") != NULL ? $request->post("mtp") : "";            
            $nama = $request->post("nama") != NULL ? $request->post("nama") : "";        
            $status = $request->post("status") != NULL ? $request->post("status") : "";
            
            $param["kode"] = $kode;
            $param["mtp"] = $mtp;
            $param["nama"] = $nama;
            $param["status"] = $status;

            $data = Marmada::when($kode, function ($query, $kode) {
                        return $query->where('vmvnum', $kode);
                    })
                    ->when($mtp, function ($query, $mtp) {
                        return $query->where('vmvtyp', $mtp);
                    })
                    ->when($status, function ($query, $status) {
                        return $query->where('vmouts', $status);
                    })
                    ->when($nama, function ($query, $nama) {
                        return $query->where('vmdesc', 'LIKE', '%' . $nama . '%');
                    })
                    ->paginate(50);
            #dd($data);
            return view('marmada.index', ['datas'=>$data, 'kode'=>'', 'pesan'=>'', 'param'=>$param, 'hakakses'=>$hakakses]);
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
        $hakakses = Globalfunction::cekAkses('marmada');
        if($hakakses['auc']=='1'){
            $mtpype = Mtparmada::get();
            return view('marmada.create', ['mtype'=>$mtpype]);
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
               'vmvnum' => 'required',
               'vmdesc' => 'required',
               'vmvtyp' => 'required',
        ]);
        
        if (Marmada::where(['vmvnum'=>$request->vmvnum])->doesntExist()) { // Cek data apakah sudah ada atau belum di database 
            $request->request->add(['vmcrby'=>session::get('infoUser')[0]['username']]);
            Marmada::create($request->all());
            return redirect('/marmada')->with(['kode'=>'99', 'pesan'=>'Data berhasil disampan !']);
        }else{
            return redirect('/marmada')->with(['kode'=>'98','pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mot\Mot  $mtparmada
     * @return \Illuminate\Http\Response
     */
    public function show(Marmada $marmada)
    {
        $hakakses = Globalfunction::cekAkses('marmada');
        if($hakakses['aur']=='1'){
            $data = DB::table('mfvehi as a')
                ->select(
                    'a.vmvehid',
                    'a.vmvnum',
                    'a.vmdesc',
                    'a.vmsernum',
                    'a.vmplate',
                    'a.vmpltype',
                    'a.vmennum',
                    'a.vmbrand',
                    'a.vmvown',
                    'a.vmbrun',
                    'a.vmmfyr',
                    'a.vmaqyr',
                    'a.vmvtyp',
                    'a.vmhanac',
                    'a.vmwuom',
                    'a.vmeweight',
                    'a.vmcweight',
                    'a.vmvuom',
                    'a.vmcvolume',
                    'a.vmpuom',
                    'a.vmcpiece',
                    'a.vmdpool',
                    'a.vmdcarrier',
                    'a.vmouts',
                    'a.vmtaxrate',
                    'a.vmcrby',
                    'a.created_at',
                    'a.vmedby',
                    'a.updated_at',
                    'a.vmexpd1',
                    'a.vmexpd2',
                    'a.vmexpd3',
                )
                ->leftjoin('mfvehitype as b', 'b.vtvtyp', '=', 'a.vmvtyp') 
                ->where('a.vmvehid', '=', $marmada->vmvehid)
                ->get();
            #dd($data);
            return view('marmada.show',['datas'=>$data, 'hakakses'=>$hakakses]);
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
    public function edit(Marmada $marmada)
    {
        $hakakses = Globalfunction::cekAkses('marmada');
        if($hakakses['auu']=='1'){
            $mtpype = Mtparmada::get();
            return view('marmada.edit',['datas'=>$marmada, 'mtpype'=>$mtpype]);
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
    public function update(Request $request, Marmada $marmada)
    {
        $request->validate([
               'vmvnum' => 'required',
               'vmdesc' => 'required',
               'vmvtyp' => 'required',
        ]);
        
        if (Marmada::where([
                ['vmvnum', '=', $request->vmvnum],
                ['vmdesc', '=', $request->vmdesc],
                ['vmvtyp', '=', $request->vmvtyp],
                ['vmvehid', '!=', $marmada->vmvehid]
        ])->doesntExist()) { // Cek data apakah sudah ada atau belum di database            
            Marmada::where('vmvehid', $marmada->vmvehid)
              ->update([
                    'vmvnum' => $request->vmvnum,
                    'vmdesc' => $request->vmdesc,
                    'vmsernum' => $request->vmsernum,
                    'vmplate' => $request->vmplate,
                    'vmpltype' => $request->vmpltype,
                    'vmennum' => $request->vmennum,
                    'vmbrand' => $request->vmbrand,
                    'vmvown' => $request->vmvown,
                    'vmbrun' => $request->vmbrun,
                    'vmmfyr' => $request->vmmfyr,
                    'vmaqyr' => $request->vmaqyr,
                    'vmvtyp' => $request->vmvtyp,
                    'vmhanac' => $request->vmhanac,
                    'vmwuom' => $request->vmwuom,
                    'vmeweight' => $request->vmeweight,
                    'vmcweight' => $request->vmcweight,
                    'vmvuom' => $request->vmvuom,
                    'vmcvolume' => $request->vmcvolume,
                    'vmpuom' => $request->vmpuom,
                    'vmcpiece' => $request->vmcpiece,
                    'vmdpool' => $request->vmdpool,
                    'vmdcarrier' => $request->vmdcarrier,
                    'vmouts' => $request->vmouts,
                    'vmtaxrate' => $request->vmtaxrate,
                    'vmedby'=>session::get('infoUser')[0]['username']
            ]);
            return redirect('/marmada')->with(['kode'=>'99', 'pesan'=>'Data berhasil diubah !']);
        }else{
            return redirect('/marmada')->with(['kode'=>'98', 'pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mot\Mot  $mtparmada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marmada $marmada)
    {
        $hakakses = Globalfunction::cekAkses('marmada');
        if($hakakses['aud']=='1'){
            Marmada::where('vmvehid', $marmada->vmvehid)
              ->update([
                  'vmdeby'=>session::get('infoUser')[0]['username'],                  
                  'vmdefl'=>'1'
            ]);
            Marmada::destroy($marmada->vmvehid);
            return redirect('/marmada')->with(['kode'=>'90', 'pesan'=> 'Data berhasil dihapus !']);
        }else{
            return redirect('/401');
        }
    }
    
    public function gettype($id)
    {
        $data = Mtparmada::where(['vtvtyp'=>$id])->get();
        $json = json_encode($data);
        return $json;
    }
}
