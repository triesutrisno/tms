<?php

namespace App\Models\Aksesuser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksesuser extends Model
{
    use HasFactory;
	protected $table = "aksesuser";
    protected $primaryKey = "aksesuser_id";
    public $incrementing = false;
    protected $fillable = ['username','role_nama', 'menu_id', 'aksesuser_status', 'auc', 'aur', 'auu', 'aud', 'au01', 'au02', 'au03'];
}
