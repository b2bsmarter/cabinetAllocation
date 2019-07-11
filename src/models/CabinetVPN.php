<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class CabinetVPN extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'cabinet_vpn';
    protected $fillable = ['customer', 'site', 'datacentre_firewall', 'remote_site_ip', 'remote_site_router', 'local_ip', 'remote_site_ip_netmask', 'preshared_key', 'asa_group_policy'];




}
