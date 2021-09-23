<?php

namespace App\Http\Controllers\Mot;

use App\Http\Controllers\Controller;
use App\Models\Globalfunction;
use App\Models\Mot\Mot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hakakses = Globalfunction::cekAkses('mmot');
        if($hakakses['aur']=='1'){
            $nama = $request->post("nama") != NULL ? $request->post("nama") : "";
            $param["nama"] = $nama;

            $data = Mot::when($nama, function ($query, $nama) {
                        return $query->where('mtdesc', 'LIKE', '%' . $nama . '%');
                    })
                    ->paginate(50);
            #dd($data);
            #return view('menu.index',compact('menus')); // fungsi compact digunakan jika nama variabel dan nama parameternya sama
            return view('mot.index', ['datas'=>$data, 'kode'=>'', 'pesan'=>'', 'param'=>$param, 'hakakses'=>$hakakses]);
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
        $hakakses = Globalfunction::cekAkses('mmot');
        if($hakakses['auc']=='1'){
            return view('mot.create');
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
               'mtmot' => 'required',
        ]);
        
        if (Mot::where(['mtmot'=>$request->mtmot])->doesntExist()) { // Cek data apakah sudah ada atau belum di database 
            $request->request->add(['mtcrby'=>session::get('infoUser')[0]['username']]);
            Mot::create($request->all());
            return redirect('/mmot')->with(['kode'=>'99', 'pesan'=>'Data berhasil disampan !']);
        }else{
            return redirect('/mmot')->with(['kode'=>'98','pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mot\Mot  $mot
     * @return \Illuminate\Http\Response
     */
    public function show(Mot $mot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mot\Mot  $mot
     * @return \Illuminate\Http\Response
     */
    public function edit(Mot $mmot)
    {
        $hakakses = Globalfunction::cekAkses('mmot');
        if($hakakses['auu']=='1'){
            return view('mot.edit',['datas'=>$mmot]);
        }else{
            return redirect('/401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mot\Mot  $mot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mot $mmot)
    {
        $request->validate([
               'mtdesc' => 'required',
        ]);
        
        if (Mot::where([
                ['mtmot', '=', $request->mtmot],
                ['mtmot', '!=', $mmot->mtmot]
        ])->doesntExist()) { // Cek data apakah sudah ada atau belum di database            
            Mot::where('mtmot', $mmot->mtmot)
              ->update([
                  'mtmot' => $request->mtmot,
                  'mtdesc' => $request->mtdesc,
                  'mtedby'=>session::get('infoUser')[0]['username']
            ]);
            return redirect('/mmot')->with(['kode'=>'99', 'pesan'=>'Data berhasil diubah !']);
        }else{
            return redirect('/mmot')->with(['kode'=>'98', 'pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mot\Mot  $mot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mot $mmot)
    {
        $hakakses = Globalfunction::cekAkses('mmot');
        if($hakakses['aud']=='1'){
            Mot::where('mtmot', $mmot->mtmot)
              ->update([
                  'mtdeby'=>session::get('infoUser')[0]['username'],                  
                  'mtdefl'=>'1'
            ]);
            Mot::destroy($mmot->mtmot);
            return redirect('/mmot')->with(['kode'=>'90', 'pesan'=> 'Data berhasil dihapus !']);
        }else{
            return redirect('/401');
        }
    }
}
