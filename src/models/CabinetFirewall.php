<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class CabinetFirewall extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'cabinet_firewall';
    protected $fillable = ['source_interface', 'source_ip', 'source_name', 'destination_interface', 'destination_address', 'service_port', 'service_name',
                            'source_nat_type', 'translated_source_address', 'translated_destination_address', 'translated_service_port', 'translated_service_name',
                            'description'];




}
