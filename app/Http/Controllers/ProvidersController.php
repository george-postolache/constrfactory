<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Providers;
use App\Models\Logs;

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
        $provider->logs()->attach(1);
        return redirect('providers'); 

    }
    public function destroy($id)
    {
        
        $provider = Providers::find($id);
        $provider->delete();
        $deleted = $provider;
        $provider->logs()->attach(2);
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
    	
    	$provider->denumire = request('denumire');
        $provider->telefon = request('telefon');
        $provider->adresa = request('adresa');
        $provider->save();
        $provider->logs()->attach(3);
        return redirect('/providers'); 

    }
    public function edit($id)
    {
    	$provider=Providers::find($id);
        return view('Provider.edit',['provider'=>$provider]);
    }
}
