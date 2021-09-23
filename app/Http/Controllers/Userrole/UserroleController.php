<?php

namespace App\Http\Controllers\Userrole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userrole\Userrole;
use App\Models\Role\Role;
use App\Models\User;
use App\Models\Menurole\Menurole;
use App\Models\Aksesuser\Aksesuser;
use Illuminate\Support\Facades\DB;

class UserroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $username = $request->post("username") != NULL ? $request->post("username") : "";
        $namaRole = $request->post("namaRole") != NULL ? $request->post("namaRole") : "";
        $status = $request->post("status") != NULL ? $request->post("status") : "";
        $param["username"] = $username;
        $param["namaRole"] = $namaRole;
        $param["status"] = $status;
        
        $userroles = Userrole::when($status, function ($query, $status) {
                    return $query->where('userrole_status', $status);
                })
                ->when($username, function ($query, $username) {
                    return $query->where('username', $username);
                })
                ->when($namaRole, function ($query, $namaRole) {
                    return $query->where('role_nama', 'LIKE', '%' . $namaRole . '%');
                })
                ->paginate(50);
        #dd($menus);
        return view('userrole.index', ['datas'=>$userroles, 'kode'=>'', 'pesan'=>'', 'param'=>$param]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where(['status'=>'1'])->get();
        $roles = Role::where(['role_status'=>'1'])->get();
        return view('userrole.create',['users'=>$users, 'roles'=>$roles]);
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
               'username' => 'required',
               'role_nama' => 'required',
        ]);
        
        //dd($request);
        $dateTime = date("Y-m-d H:i:s");
        if (Userrole::where(['username'=>$request->username,'role_nama'=>$request->role_nama, 'userrole_status'=>'1'])->doesntExist()) { // Cek data apakah sudah ada atau belum di database            
            $insert = Userrole::create($request->all());            
            try {
                $insAksesuser = [];
                $menuRoles = Menurole::where(['role_nama'=>$request->role_nama])->get();
                foreach($menuRoles as $menuRole) {
                    $insAksesuser[] = [ 
                           'menu_id' => $menuRole->menu_id,
                           'role_nama' => $request->role_nama, 
                           'username' => $request->username , 
                           'aksesuser_status' => $request->userrole_status,
                           'auc' => $menuRole->mrc,
                           'aur' => $menuRole->mrr,
                           'auu' => $menuRole->mru,
                           'aud' => $menuRole->mrd,
                           'au01' => $menuRole->mr01,
                           'au02' => $menuRole->mr02,
                           'au03' => $menuRole->mr03,
                           'created_at' => $dateTime,
                           'updated_at' => $dateTime
                        ]; 
                }
                DB::table('aksesuser')->insert($insAksesuser);
            } catch (Throwable $e) {
                return false;
            }
            return redirect('/userrole')->with(['kode'=>'99', 'pesan'=>'Data berhasil disampan !']);
        }else{
            return redirect('/userrole')->with(['kode'=>'98','pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Model\Userrole\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function show(Userrole $userrole)
    {
        $hakAkses = DB::table('aksesuser AS a')
                    ->select('a.username', 'a.role_nama', 'b.menu_id', 'b.menu_nama', 'b.menu_link', 'b.menu_type', 'b.menu_parent', 'b.menu_icon', 'aksesuser_status', 'a.auc', 'a.aur', 'a.auu', 'a.aud', 'a.au01', 'a.au02', 'a.au03')
                    ->join('menu AS b', ['a.menu_id' => 'b.menu_id'])
                    ->where([
                        ['a.aksesuser_status', '=', '1'],
                        ['b.menu_status', '=', '1'],
                        ['a.username', '=', $userrole->username],                        
                        ['a.role_nama', '=', $userrole->role_nama]
                    ])
                    ->whereNull('b.deleted_at')
                    ->orderBy('b.menu_sort', 'ASC')
                    ->get();
        return view('userrole.show',['datas'=>$hakAkses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Model\Userrole\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function edit(Userrole $userrole)
    {
        $users = User::where(['status'=>'1'])->get();
        $roles = Role::where(['role_status'=>'1'])->get();
        //dd($roles);
        return view('userrole.edit',['userroles'=>$userrole, 'users'=>$users, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Model\Userrole\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userrole $userrole)
    {
        $request->validate([
               'username' => 'required',
               'role_nama' => 'required',
        ]);
        $dateTime = date("Y-m-d H:i:s");
        if (Userrole::where([
                ['username', '=', $request->username],
                ['role_nama', '=', $request->role_nama],
                ['userrole_status', '=', $request->userrole_status],
                ['userrole_id', '!=', $userrole->userrole_id]
        ])->doesntExist()) { // Cek data apakah sudah ada atau belum di database            
            Userrole::where('userrole_id', $userrole->userrole_id)
              ->update([
                  'username' => $request->username,
                  'role_nama' => $request->role_nama,
                  'userrole_status' => $request->userrole_status,
                  'updated_at' => $dateTime
            ]);
            
            try {
                $del = Aksesuser::where(['username'=>$userrole->username, 'role_nama'=>$userrole->role_nama])->delete();
                $insAksesuser = [];
                $menuRoles = Menurole::where(['role_nama'=>$request->role_nama])->get();
                foreach($menuRoles as $menuRole) {
                    $insAksesuser[] = [ 'menu_id' => $menuRole->menu_id,
                           'role_nama' => $request->role_nama, 
                           'username' => $request->username , 
                           'aksesuser_status' => $request->userrole_status,
                           'auc' => $menuRole->mrc,
                           'aur' => $menuRole->mrr,
                           'auu' => $menuRole->mru,
                           'aud' => $menuRole->mrd,
                           'au01' => $menuRole->mr01,
                           'au02' => $menuRole->mr02,
                           'au03' => $menuRole->mr03,
                           'created_at' => $dateTime,
                           'updated_at' => $dateTime]; 
                }
                DB::table('aksesuser')->insert($insAksesuser);
            } catch (Throwable $e) {
                return false;
            }
            return redirect('/userrole')->with(['kode'=>'99', 'pesan'=>'Data berhasil diubah !']);
        }else{
            return redirect('/userrole')->with(['kode'=>'98', 'pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Model\Userrole\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userrole $userrole)
    {
        Userrole::destroy($userrole->userrole_id);
        $del = Aksesuser::where(['username'=>$userrole->username, 'role_nama'=>$userrole->role_nama])->delete();
        return redirect('/userrole')->with(['kode'=>'99', 'pesan'=> 'Data berhasil dihapus !']);   
    }
}
