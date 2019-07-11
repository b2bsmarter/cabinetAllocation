<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class CabinetAdminAccount extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'cabinet_admin_accounts';
    protected $fillable = ['account_name', 'username', 'password', 'description'];


}
