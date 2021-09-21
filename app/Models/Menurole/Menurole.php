<?php

namespace App\Models\Menurole;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menurole extends Model
{
    use SoftDeletes;
    protected $table = "menurole";
    protected $primaryKey = "menurole_id";
    public $incrementing = false;
    protected $fillable = ['menu_id','role_nama', 'menurole_status', 'mrc', 'mrr', 'mru', 'mrd', 'mr01', 'mr02', 'mr03'];
}
