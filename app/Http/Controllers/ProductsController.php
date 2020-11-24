<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Log;
use App\Models\Contracts;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $contracts = Contracts::all();
        return view('Product.products',[
            'products'=>$products,
            'contracts'=>$contracts
        ]);
    }

    public function store(Request $request)
    {
    	request()->validate([
            
                'name'=>'required'
                
            
            ]);

        $product = new Products();
        $product->name = request('name');
        $product->contracts_id = request('contracts_id');
        $product->save();
        $last = Products::orderBy('id', 'desc')->first();
        $logs = new Log();
        $logs->model = 'Products';
        $logs->id_model = $last['id'];
        $logs->action = 'Create';
        $logs->save();
        return redirect('products'); 

    }
    public function destroy($id)
    {
        
        $product=Products::find($id);
        $product->delete();
        $deleted = $product;
        $logs = new Log();
        $logs->model = 'Products';
        $logs->id_model = $deleted['id'];
        $logs->action = 'Destroy';
        $logs->save();
        return redirect('/products');
    }

    public function update(Request $request)
    {
    	request()->validate([
            
                'name'=>'required'
                
            
            ]);
    	$product=Products::find(request('id'));
        $updated = $product;
    	$product->name = request('name');
        $product->contracts_id = request('contracts_id');
        $product->save();
        
        $logs = new Log();
        $logs->model = 'Products';
        $logs->id_model = $updated['id'];
        $logs->action = 'Update';
        $logs->save();
        return redirect('/products'); 

    }
    public function edit($id)
    {
    	$product=Products::find($id);
    	$contracts=Contracts::all();
        return view('Product.edit',['product'=>$product,'contracts'=>$contracts]);
    }
}
