<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class CabinetThreeCX extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'cabinet_3cx';
    protected $fillable = ['customer', 'server_name', 'ip_address', 'hdd', 'call_recording', 'fqdn', 'management_port', 'licence_key_type', 
                            'licence_key', 'email_address', 'customer_portal_username', 'customer_portal_password', 'root_username', 'root_password',
                            'threecx_login', 'threecs_password', 'sip_provider', 'address'];


}
