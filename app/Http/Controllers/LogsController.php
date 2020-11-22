<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
class LogsController extends Controller
{
    public function index()
    {
    	$logs = Log::orderBy('id', 'desc')->get();

    	return view('Log.logs',['logs'=>$logs]);	
    }
}
