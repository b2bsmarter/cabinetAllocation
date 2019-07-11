<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use App\Traits\HasNotes;

class Cabinet extends Model
{
    use Auditable, HasNotes, SoftDeletes;

    protected $table = 'cabinet';
    protected $fillable = ['back_of_cabinet_hot', 'front_of_cabinet_cold'];


}
