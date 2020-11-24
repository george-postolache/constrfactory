<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Logs;
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
        
        $product->save();
        $product->logs()->attach(1);
        return redirect('products'); 

    }
    public function destroy($id)
    {
        
        $product=Products::find($id);
        $product->delete();
        $product->logs()->attach(2);
        return redirect('/products');
    }

    public function update(Request $request)
    {
    	request()->validate([
            
                'name'=>'required'
                
            
            ]);
    	$product=Products::find(request('id'));
       
    	$product->name = request('name');
        
        $product->save();
        
        $product->logs()->attach(3);
        return redirect('/products'); 

    }
    public function edit($id)
    {
    	$product=Products::find($id);
    	$contracts=Contracts::all();
        return view('Product.edit',['product'=>$product,'contracts'=>$contracts]);
    }
}
