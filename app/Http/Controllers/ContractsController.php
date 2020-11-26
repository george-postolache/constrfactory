<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Providers;
use App\Models\Contracts;
use App\Models\Logs;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ContractsController extends Controller
{
    public function index()
    {
        $providers = Providers::all();
        $contracts = Contracts::all();
        $contracts_products = DB::table('contracts_products')->get();


        return view('Contract.contracts',[
            'providers'=>$providers,
            'contracts'=>$contracts,
            'contracts_products'=>$contracts_products
        ]);
    }

    public function store(Request $request)
    {
    	request()->validate([
            
                'providers_id'=>'required',
                'produs'=>'required',
                'cantitate'=>'required',
                'valoare'=>'required'
                
            
            ]);

        $contract = new Contracts();
        $contract->providers_id = request('providers_id');
        $contract->produs = request('produs');
        $contract->cantitate = request('cantitate');
        $contract->valoare = request('valoare');
        $contract->save();
        $produs = $contract->produs;
        $product_id = Products::select('id')->where('name',$produs)->first();
       
        if(is_null($product_id) ){
            $products = new Products();
            $products->name = $contract->produs;
            $products->save();
            $products_id = Products::select('id')->where('name',$produs)->first();
       
            $contract->products()->attach($products_id);
            
        }
        else {
            $contract->products()->attach($product_id);
            
        }
        $contract->logs()->attach(1);
       
        return redirect('contracts'); 

    }
    public function destroy($id)
    {
        
        $contract=Contracts::find($id);
        $contract->delete();
        $contract->logs()->attach(2);
        return redirect('/contracts');
    }

    public function update(Request $request)
    {
    	request()->validate([
            
                'providers_id'=>'required',
                'produs'=>'required',
                'cantitate'=>'required',
                'valoare'=>'required'
            
            ]);
    	$contract=Contracts::find(request('id'));
       
    	$contract->providers_id = request('providers_id');
        $contract->produs = request('produs');
        $contract->cantitate = request('cantitate');
        $contract->valoare = request('valoare');
        $contract->save();
        $contract->logs()->attach(3);
        
        return redirect('/contracts'); 

    }
    public function edit($id)
    {
    	$providers=Providers::all();
    	$contract=Contracts::find($id);
        return view('Contract.edit',['providers'=>$providers,'contract'=>$contract]);
    }
}