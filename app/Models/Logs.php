<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{	
	
    use HasFactory;
    protected $guarded = [];
  

    public function products()
    {
        return $this->morphedByMany('App\Models\Products', 'loggable');
    }
    public function contracts()
    {
        return $this->morphedByMany('App\Models\Contracts', 'loggable');
    }
    public function Providers()
    {
        return $this->morphedByMany('App\Models\Providers', 'loggable');
    }
}
