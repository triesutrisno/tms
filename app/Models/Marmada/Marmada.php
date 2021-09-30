<?php

namespace App\Models\Marmada;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marmada extends Model
{    
    use SoftDeletes;
    protected $table = "mfvehi";
    protected $primaryKey = "vmvehid";
    public $incrementing = false;
    protected $fillable = [
                    'vmvnum',
                    'vmdesc',
                    'vmsernum',
                    'vmplate',
                    'vmpltype',
                    'vmennum',
                    'vmbrand',
                    'vmvown',
                    'vmbrun',
                    'vmmfyr',
                    'vmaqyr',
                    'vmvtyp',
                    'vmhanac',
                    'vmwuom',
                    'vmeweight',
                    'vmcweight',
                    'vmvuom',
                    'vmcvolume',
                    'vmpuom',
                    'vmcpiece',
                    'vmdpool',
                    'vmdcarrier',
                    'vmouts',
                    'vmtaxrate',
                    'vmcrby',
                    'vmedby',
                    'vmdeby',
                    'vmdefl',
                    'vmexpd1',
                    'vmexpd2',
                    'vmexpd3'

                ];
}
