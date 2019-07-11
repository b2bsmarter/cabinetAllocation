<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class OffsiteBackup extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'offsite_backups';
    protected $fillable = ['type', 'customer', 'username', 'ashay_backup_type', 'password', 'master_key_encryption'];




}
