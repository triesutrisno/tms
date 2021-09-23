<?php

namespace App\Models\Mot;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mot extends Model
{    
    use SoftDeletes;
    protected $table = "mfmot";
    protected $primaryKey = "mtmot";
    public $incrementing = false;
    protected $fillable = ['mtmot', 'mtdesc', 'mtcrby', 'mtedby', 'mtdeby', 'mtdefl'];
}
