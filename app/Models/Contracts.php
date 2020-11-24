<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contracts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function providers()
    {
    	return $this->belongsTo('App\Models\Providers');
    }

    public function products()
    {
    	return $this->belongsToMany('App\Models\Products');
    }
    public function logs()
    {
        return $this->morphToMany('App\Models\Logs', 'loggable');
    }
}
