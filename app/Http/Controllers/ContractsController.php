<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Providers;
use App\Models\Contracts;
use App\Models\Log;
class ContractsController extends Controller
{
    public function index()
    {
        $providers = Providers::all();
        $contracts = Contracts::all();
        return view('Contract.contracts',[
            'providers'=>$providers,
            'contracts'=>$contracts
        ]);
    }

    public function store(Request $request)
    {
    	request()->validate([
            
                'furnizor_id'=>'required',
                'produs'=>'required',
                'cantitate'=>'required',
                'valoare'=>'required'
                
            
            ]);

        $contract = new Contracts();
        $contract->furnizor_id = request('furnizor_id');
        $contract->produs = request('produs');
        $contract->cantitate = request('cantitate');
        $contract->valoare = request('valoare');
        $contract->save();
        $last = Contracts::orderBy('id', 'desc')->first();
        $logs = new Log();
        $logs->model = 'Contracts';
        $logs->id_model = $last['id'];
        $logs->action = 'Create';
        $logs->save();
        return redirect('contracts'); 

    }
    public function destroy($id)
    {
        
        $contract=Contracts::find($id);
        $contract->delete();
        $deleted = $contract;
        $logs = new Log();
        $logs->model = 'Contracts';
        $logs->id_model = $deleted['id'];
        $logs->action = 'Destroy';
        $logs->save();
        return redirect('/contracts');
    }

    public function update(Request $request)
    {
    	request()->validate([
            
                'furnizor_id'=>'required',
                'produs'=>'required',
                'cantitate'=>'required',
                'valoare'=>'required'
            
            ]);
    	$contract=Contracts::find(request('id'));
        $updated = $contract;
    	$contract->furnizor_id = request('furnizor_id');
        $contract->produs = request('produs');
        $contract->cantitate = request('cantitate');
        $contract->valoare = request('valoare');
        $contract->save();
        
        $logs = new Log();
        $logs->model = 'Contracts';
        $logs->id_model = $updated['id'];
        $logs->action = 'Update';
        $logs->save();
        return redirect('/contracts'); 

    }
    public function edit($id)
    {
    	$providers=Providers::all();
    	$contract=Contracts::find($id);
        return view('Contract.edit',['providers'=>$providers,'contract'=>$contract]);
    }
}