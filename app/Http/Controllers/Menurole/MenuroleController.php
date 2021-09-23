<?php

namespace App\Http\Controllers\Menurole;

use App\Http\Controllers\Controller;
use App\Models\Menurole\Menurole;
use App\Models\Menu\Menu;
use App\Models\Role\Role;
use App\Models\Aksesuser\Aksesuser;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class MenuroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $namaMenu = $request->post("namaMenu") != NULL ? $request->post("namaMenu") : "";
        $namaRole = $request->post("namaRole") != NULL ? $request->post("namaRole") : "";
        $status = $request->post("status") != NULL ? $request->post("status") : "";
        $param["namaMenu"] = $namaMenu;
        $param["namaRole"] = $namaRole;
        $param["status"] = $status;
        
        $menuroles = DB::table('menurole as a')
                    ->select(
                        'a.menurole_id',
                        'a.role_nama',
                        'a.menu_id',
                        'b.menu_nama',
                        'a.menurole_status',
                        'a.mrc',
                        'a.mrr',
                        'a.mru',
                        'a.mrd',
                        'a.mr01',
                        'a.mr02',
                        'a.mr03'
                    )
                    ->leftjoin('menu as b', 'b.menu_id', '=', 'a.menu_id') 
                    ->whereNull('a.deleted_at')
                    ->when($status, function ($query, $status) {
                        return $query->where('a.menurole_status', $status);
                    })
                    ->when($namaMenu, function ($query, $namaMenu) {
                        return $query->where('b.menu_nama', 'LIKE', '%' . $namaMenu . '%');
                    })
                    ->when($namaRole, function ($query, $namaRole) {
                        return $query->where('a.role_nama', 'LIKE', '%' . $namaRole . '%');
                    })                    
                    ->orderBy('a.role_nama', 'asc')
                    ->paginate(50);
        //dd($roles);
        return view('menurole.index', ['datas'=>$menuroles, 'kode'=>'', 'pesan'=>'', 'param'=>$param]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where(['menu_status'=>'1'])->get();
        $roles = Role::where(['role_status'=>'1'])->get();
        return view('menurole.create',['menus'=>$menus, 'roles'=>$roles]);
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
               'menu' => 'required',
               'role_nama' => 'required',
        ]);
        $sukses = $error = 0;
        $datetime = date("Y-m-d H:i:s");
        $mrc = isset($request->mrc) ? $request->mrc : 0;
        $mrr = isset($request->mrr) ? $request->mrr : 0;
        $mru = isset($request->mru) ? $request->mru : 0;
        $mrd = isset($request->mrd) ? $request->mrd : 0;
        $mr01 = isset($request->mr01) ? $request->mr01 : 0;
        $mr02 = isset($request->mr02) ? $request->mr02 : 0;
        $mr03 = isset($request->mr03) ? $request->mr03 : 0;
        
        foreach($request->menu as $val){
            if (Menurole::where(['menu_id'=>$val,'role_nama'=>$request->role_nama, 'menurole_status'=>'1'])->doesntExist()) { // Cek data apakah sudah ada atau belum di database            
                $request->request->add(['menu_id'=>$val]);
                $request->request->add(['mrc'=>$mrc]);
                $request->request->add(['mrr'=>$mrr]);
                $request->request->add(['mru'=>$mru]);
                $request->request->add(['mrd'=>$mrd]);
                $request->request->add(['mr01'=>$mr01]);
                $request->request->add(['mr02'=>$mr02]);
                $request->request->add(['mr03'=>$mr03]);
                
                $menuRole = Menurole::create($request->all());
                if($menuRole){
                    $getAkses = DB::table('aksesuser')
                        ->select('username')
                        ->where(['aksesuser_status'=>'1', 'role_nama'=>$request->role_nama])
                        #->whereNull('deleted_at')
                        ->groupBy('username')
                        ->get();
                    foreach($getAkses as $valData){
                        #dd($valData);
                        DB::table('aksesuser')
                        ->insert([
                            'menu_id' => $val,
                            'role_nama' => $request->role_nama,
                            'username' => $valData->username,
                            'aksesuser_status' => '1',
                            'auc' => $mrc,
                            'aur' => $mrr,
                            'auu' => $mru,
                            'aud' => $mrd,
                            'au01' => $mr01,
                            'au02' => $mr02,
                            'au03' => $mr03,
                            'created_at' => $datetime,
                            #'createBy' => auth()->user()->username
                        ]);
                    }
                    $sukses++;
                }else{
                    $error++;
                }
            }else{
                $error++;
            }
        }
        return redirect('/menurole')->with(['kode'=>'99', 'pesan'=>$sukses.' data berhasil disampan dan '.$error.' data sudah ada !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menurole  $menurole
     * @return \Illuminate\Http\Response
     */
    public function show(Menurole $menurole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menurole  $menurole
     * @return \Illuminate\Http\Response
     */
    public function edit(Menurole $menurole)
    {
        $menus = Menu::where(['menu_status'=>'1'])->get();
        $roles = Role::where(['role_status'=>'1'])->get();
        return view('menurole.edit',['menurole'=>$menurole, 'menus'=>$menus, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menurole  $menurole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menurole $menurole)
    {
        #dd($request->all());
        $mrc = isset($request->mrc) ? $request->mrc : 0;
        $mrr = isset($request->mrr) ? $request->mrr : 0;
        $mru = isset($request->mru) ? $request->mru : 0;
        $mrd = isset($request->mrd) ? $request->mrd : 0;
        $mr01 = isset($request->mr01) ? $request->mr01 : 0;
        $mr02 = isset($request->mr02) ? $request->mr02 : 0;
        $mr03 = isset($request->mr03) ? $request->mr03 : 0;
        
        $datetime = date("Y-m-d H:i:s");
        
        $request->validate([
               'menu_id' => 'required',
               'role_nama' => 'required',
        ]);
        if (Menurole::where([
                ['menu_id', '=', $request->menu_id],
                ['role_nama', '=', $request->role_nama],
                ['menurole_status', '=', '1'],
                ['deleted_at', '=', 'NULL'],
                ['menurole_id', '!=', $menurole->menurole_id]
        ])->doesntExist()) { // Cek data apakah sudah ada atau belum di database             
            Aksesuser::where(['menu_id'=>$menurole->menu_id, 'role_nama'=>$menurole->role_nama])
                ->update([                        
                    'menu_id' => $request->menu_id,
                    'role_nama' => $request->role_nama,
                    'aksesuser_status' => $request->menurole_status,
                    'auc' => $mrc,
                    'aur' => $mrr,
                    'auu' => $mru,
                    'aud' => $mrd,
                    'au01' => $mr01,
                    'au02' => $mr02,
                    'au03' => $mr03,
                    'updated_at' => $datetime
            ]);
            
                       
            Menurole::where('menurole_id', $menurole->menurole_id)
              ->update([
                  'menu_id' => $request->menu_id,
                  'role_nama' => $request->role_nama,
                  'menurole_status' => $request->menurole_status,
                  'mrc' => $mrc,
                  'mrr' => $mrr,
                  'mru' => $mru,
                  'mrd' => $mrd,
                  'mr01' => $mr01,
                  'mr02' => $mr02,
                  'mr03' => $mr03,
            ]);
            
            return redirect('/menurole')->with(['kode'=>'99', 'pesan'=>'Data berhasil diubah !']);
        }else{
            return redirect('/menurole')->with(['kode'=>'98', 'pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menurole  $menurole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menurole $menurole)
    {
        $hapusAkses = DB::table('aksesuser')->where(['menu_id'=>$menurole->menu_id, 'role_nama'=>$menurole->role_nama])->delete();
        Menurole::destroy($menurole->menurole_id);
        return redirect('/menurole')->with(['kode'=>'99', 'pesan'=> 'Data berhasil dihapus !']);   
    }
}
