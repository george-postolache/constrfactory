<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Providers;
use App\Models\Log;

class ProvidersController extends Controller
{
   	public function index()
   	{
   		$providers = Providers::all();
   		return view('Provider.providers',[
   			'providers'=>$providers
   		]);

   	}
   	 public function store(Request $request)
    {
    	request()->validate([
            
                'denumire'=>'required',
                'telefon'=>'required',
                'adresa'=>'required'
            
            ]);

        $provider = new Providers();
        $provider->denumire = request('denumire');
        $provider->telefon = request('telefon');
        $provider->adresa= request('adresa');
        $provider->save();
        $last = Providers::orderBy('id', 'desc')->first();
        $logs = new Log();
        $logs->model = 'Providers';
        $logs->id_model = $last['id'];
        $logs->action = 'Create';
        $logs->save();
        return redirect('providers'); 

    }
    public function destroy($id)
    {
        
        $provider = Providers::find($id);
        $provider->delete();
        $deleted = $provider;
        $logs = new Log();
        $logs->model = 'Providers';
        $logs->id_model = $deleted['id'];
        $logs->action = 'Destroy';
        $logs->save();
        return redirect('/providers');
    }

    public function update(Request $request)
    {
    	request()->validate([
            
                'denumire'=>'required',
                'telefon'=>'required',
                'adresa'=>'required'
            
            ]);
    	$provider=Providers::find(request('id'));
    	$updated = $provider;
    	$provider->denumire = request('denumire');
        $provider->telefon = request('telefon');
        $provider->adresa = request('adresa');
        $provider->save();
        $logs = new Log();
        $logs->model = 'Providers';
        $logs->id_model = $updated['id'];
        $logs->action = 'Update';
        $logs->save();
        return redirect('/providers'); 

    }
    public function edit($id)
    {
    	$provider=Providers::find($id);
        return view('Provider.edit',['provider'=>$provider]);
    }
}
