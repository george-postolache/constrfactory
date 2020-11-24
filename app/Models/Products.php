<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    

    public function contracts()
    {
    	return $this->belongsToMany('App\Models\Contracts');
    }
    public function logs()
    {
        return $this->morphToMany('App\Models\Logs', 'loggable');
    }
}
