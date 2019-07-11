<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class CabinetInterface extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'cabinet_interfaces';
    protected $fillable = ['customer', 'short_code', 'vlan', 'interface', 'subnet'];




}
