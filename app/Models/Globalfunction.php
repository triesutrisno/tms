<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Globalfunction extends Model
{    
    public static function cekAkses($link){
        $hakAkses = DB::table('aksesuser AS a')
                    ->select('a.username', 'a.role_nama', 'b.menu_id', 'b.menu_nama', 'b.menu_link', 'b.menu_type', 'b.menu_parent', 'b.menu_icon', 'a.auc', 'a.aur', 'a.auu', 'a.aud', 'a.au01', 'a.au02', 'a.au03')
                    ->join('menu AS b', ['a.menu_id' => 'b.menu_id'])
                    ->where([
                        ['a.aksesuser_status', '=', '1'],
                        ['b.menu_status', '=', '1'],
                        ['a.username', '=', session::get('infoUser')[0]['username']],
                        ['b.menu_link', '=', $link]
                    ])
                    ->whereNull('b.deleted_at')
                    ->orderBy('b.menu_sort', 'ASC')
                    ->get();
        if($hakAkses[0]->menu_link==$link){
            return [
                'auc' => $hakAkses[0]->auc,
                'aur' => $hakAkses[0]->aur,
                'auu' => $hakAkses[0]->auu,
                'aud' => $hakAkses[0]->aud,
                'au01' => $hakAkses[0]->au01,
                'au02' => $hakAkses[0]->au02,
                'au03' => $hakAkses[0]->au03,
            ];
        }
    }
}
