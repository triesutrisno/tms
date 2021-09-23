<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {            
            return view('layouts.index');
        }
        return view('login.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $cek = User::select('id','username','status')->where(['username'=>$request->username])->get()->toArray();
        $jml = count($cek);
        if($jml>0){
            if ($cek['0']['status']=='1') { // Cek data apakah status user masih aktif atau tidak
                #dd($cek);
                #dd(Auth::loginUsingId('1'));
                #if(Auth::attempt($request->only('username','password'))){
                #}
                if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
                    $user = Auth::user();
                    $success['id'] = $user->id;
                    $success['namaUser'] = $user->name;
                    $success['username'] = $user->username;
                    $success['email'] = $user->email;
                    $request->session()->push('infoUser', $success);
                    
                    $hakAkses = DB::table('aksesuser AS a')
                        ->select('a.username', 'a.role_nama', 'b.menu_id', 'b.menu_nama', 'b.menu_link', 'b.menu_type', 'b.menu_parent', 'b.menu_icon', 'a.auc', 'a.aur', 'a.auu', 'a.aud', 'a.au01', 'a.au02', 'a.au03')
                        ->join('menu AS b', ['a.menu_id' => 'b.menu_id'])
                        ->where([
                            ['a.aksesuser_status', '=', '1'],
                            ['b.menu_status', '=', '1'],
                            ['a.username', '=', $request->username]
                        ])
                        ->whereNull('b.deleted_at')
                        ->orderBy('b.menu_sort', 'ASC')
                        ->get();
                    #dd($hakAkses);
                    $dtAkses = $actionAkses = [];
                    if (!empty($hakAkses)) {
                        foreach ($hakAkses as $key => $val) {
                            $typeAwal = $val->menu_type;
                            if ($val->menu_type == '1') {
                                $dtAkses[$val->menu_id]['menu_id'] = $val->menu_id;
                                $dtAkses[$val->menu_id]['menu_nama'] = $val->menu_nama;
                                $dtAkses[$val->menu_id]['menu_link'] = $val->menu_link;
                                $dtAkses[$val->menu_id]['menu_type'] = $val->menu_type;
                                $dtAkses[$val->menu_id]['menu_icon'] = $val->menu_icon;
                            } else if ($val->menu_type == '2') {
                                $idLevel1 = $val->menu_parent;
                                $parent1['menu_id'] = $val->menu_id;
                                $parent1['menu_nama'] = $val->menu_nama;
                                $parent1['menu_link'] = $val->menu_link;
                                $parent1['menu_type'] = $val->menu_type;                                
                                $parent1['menu_icon'] = $val->menu_icon;

                                $dtAkses[$val->menu_parent]['data1'][$val->menu_id] = $parent1;
                            }else if ($val->menu_type == '3') {
                                $parent2['menu_id'] = $val->menu_id;
                                $parent2['menu_nama'] = $val->menu_nama;
                                $parent2['menu_link'] = $val->menu_link;
                                $parent2['menu_type'] = $val->menu_type;                                
                                $parent2['menu_icon'] = $val->menu_icon;
                                
                                #$dtParent2[] = $parent2;
                                #array_merge($dtAkses['1']['data1'],$parent2);
                                $dtAkses[$idLevel1]['data1'][$val->menu_parent]['data2'][]  = $parent2;
                            }
                            
                            
                            $dtMenu['menu_id'] = $val->menu_id;
                            $dtMenu['menu_nama'] = $val->menu_nama;
                            $dtMenu['menu_link'] = $val->menu_link;
                            $dtMenu['auc']       = $val->auc;
                            $dtMenu['aur']       = $val->aur;
                            $dtMenu['auu']       = $val->auu;
                            $dtMenu['aud']       = $val->aud;
                            $dtMenu['au01']      = $val->au01;
                            $dtMenu['au02']      = $val->au02;
                            $dtMenu['au03']      = $val->au03;
                            
                            $actionAkses[] = $dtMenu;
                        }
                    }
                    #dd($dtAkses);
                    $request->session()->put('hakAkses', $dtAkses);
                    $request->session()->put('actionAkses', $actionAkses);
                    
                    return redirect('/home');
                }
                else{
                    return redirect('/')->with('pesan', 'User atau password tidak cocok !');
                }

            }else{
                return redirect('/')->with('pesan', 'User and sudah tidak aktif !');
            }
        }else{
            return redirect('/')->with('pesan', 'User belum terdaftar !');
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
