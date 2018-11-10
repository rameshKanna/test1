<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Task extends Model implements AuditableContract
{	

	 use \OwenIt\Auditing\Auditable;


	 
    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        
    ];

    public $timestamps = true;
}
