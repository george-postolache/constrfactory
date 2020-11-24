<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;
class LogsController extends Controller
{
    public function index()
    {
    	$logs = Logs::orderBy('id', 'desc')->get();

    	return view('log.logs',['logs'=>$logs]);	
    }
}
