<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class CabinetLicence extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'cabinet_licences';
    protected $fillable = ['licence_server', 'licence', 'licence_type', 'lic_number'];


}
