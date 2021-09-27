<?php

namespace App\Models\Mtparmada;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mtparmada extends Model
{    
    use SoftDeletes;
    protected $table = "mfvehitype";
    protected $primaryKey = "vtvtyp";
    public $incrementing = false;
    protected $fillable = [
                    'vtvtyp',
                    'vtdesc',
                    'vtmot',
                    'vtwuom',
                    'vteweight',
                    'vtcweight',
                    'vtvuom',
                    'vtcvolume',
                    'vtpuom',
                    'vtcpiece',
                    'vtnaxl',
                    'vtcby',
                    'vtcrby',
                    'vtedby',
                    'vtdeby',
                    'vtdefl'
                ];
}
