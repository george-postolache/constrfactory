@extends('layouts.app')

@section('content')
    <style type="text/css">
        #add{
            margin-top: 30px;
            margin-bottom: 30px;
            margin-left:30px;
        }
        #lAdd{
            margin-left: 30px;
        }
        #lView{
            margin-left: 30px;
        }
    </style>
    <h1 align="center">Products</h1>
    <h4 id="lAdd">Add Product</h4>
    <div id="add">
        <form method="POST" action="/products">
            @csrf
            
            <label for="pname">Product's name </label>
            <input type="text" id="pname" name="name" value="{{old('name')}}">
            @if ($errors->has('name'))
                <p class="help is-danger" >{{$errors->first('name')}}</p>
            @endif
            <br>
            <label for="id" id="cid">Contract's id </label>
            <select name="id_contract" id="id">
                <option ></option>;
                @foreach ($contracts as $contract)
                    <option value="{{$contract->id}}">Id:{{$contract->id}} - Produs:{{$contract->produs}} - Furnizor:{{$contract->furnizor_id}}</option>;
                    
                    
                @endforeach
            </select>
            
            <br>
      
            <input id="btnAdauga"type="submit" value="Submit">    
        </form>
    </div>
    <h4 id="lView">View table</h4>
        <div class="card-body" background>
            <table class="table table-striped">
            	<tr>
            		<th>Name</th>
            		<th>Id Contract</th>
            		<th>Action</th>
            	</tr>
                @foreach ($products as $product)
                    <tr>
                    	<td>
                            {{ $product->name }}
                                              
                    	</td>
                    	<td>
                            {{$product->id_contract}}
                    	</td>
                        <td class="text-right">
                            <div id='button-panel'>
                            <form method="GET" action="/products/{{$product->id}}/edit">
                                
                                @csrf
                                   
                                <button type="submit" class="btn btn-primary">Edit </button>
                            </form>
                            <form method="GET" action="/products/{{$product->id}}/delete">

                                @csrf
                                
                                <button type="submit" class="btn btn-primary">Delete </button>
                            </form>
                            
                            </div>       
                        </td>
                    </tr>
                        
                @endforeach    
            </table>

                
        </div>
    </div>
@endsection