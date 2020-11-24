<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loggable;

class LoggableController extends Controller
{
   public function index()
    {
    	$logs = Loggable::all();

    	return view('log.logs',['logs'=>$logs]);	
    }

}