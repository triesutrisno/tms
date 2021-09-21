<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $nama = $request->post("nama") != NULL ? $request->post("nama") : "";
        $status = $request->post("status") != NULL ? $request->post("status") : "";
        $param["nama"] = $nama;
        $param["status"] = $status;
        
        $users = User::when($status, function ($query, $status) {
                    return $query->where('status', $status);
                })
                ->when($nama, function ($query, $nama) {
                    return $query->where('name', 'LIKE', '%' . $nama . '%');
                })
                ->paginate(50);
        return view('user.index', ['datas'=>$users, 'kode'=>'', 'pesan'=>'', 'param'=>$param]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
               'name' => 'required',
               //'password' => 'required',
        ]); 
        if (User::where(['username'=>$request->username])->doesntExist()) { // Cek data apakah sudah ada atau belum di database
            $request->request->add(['password'=>bcrypt($request->passworde)]);
            User::create($request->all());
            return redirect('/user')->with(['kode'=>'99', 'pesan'=>'Data berhasil disampan !']);
        }else{
            return redirect('/user')->with(['kode'=>'98','pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',['datas'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
               'username' => 'required',
               'name' => 'required',
               'email' => 'required|email',
        ]);
        
        if (User::where([
                ['username', '=', $request->username],
                ['id', '!=', $user->id]
        ])->doesntExist()) { // Cek data apakah sudah ada atau belum di database            
            User::where('id', $user->id)
              ->update([
                  'username' => $request->username,
                  'name' => $request->name,
                  'email' => $request->email,
                  'password'=>bcrypt($request->password),
                  'status'=>$request->status,
            ]);
            return redirect('/user')->with(['kode'=>'99', 'pesan'=>'Data berhasil diubah !']);
        }else{
            return redirect('/user')->with(['kode'=>'98', 'pesan'=>'Data sudah ada !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with(['kode'=>'99', 'pesan'=> 'Data berhasil dihapus !']);   
    }
}
