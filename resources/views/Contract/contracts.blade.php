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
    <h1 align="center">Contracts</h1>
    <h4 id="lAdd">Add contracts: </h4>

    <div id="add">
        <form method="POST" action="/contracts">
            @csrf
            <label for="id" id="cid">Provider id </label>
            <select name="providers_id" id="id">
                @foreach ($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->id}}</option>;
                      
                @endforeach
            </select>
            @if ($errors->has('providers_id'))
                <p class="help is-danger" >{{$errors->first('providers_id')}}</p>
            @endif
            <br>
            <label for="pro">Product's name </label>
            <input type="text" id="pro" name="produs" value="{{old('produs')}}">
            @if ($errors->has('produs'))
                <p class="help is-danger" >{{$errors->first('produs')}}</p>
            @endif
            <br>
            <label for="cant">Amount </label>
            <input type="text" id="cant" name="cantitate" value="{{old('cantitate')}}">
            @if ($errors->has('cantitate'))
                <p class="help is-danger" >{{$errors->first('cantitate')}}</p>
            @endif
            <br>
            <label for="pr">Price </label>
            <input type="text" id="pr" name="valoare" value="{{old('valoare')}}">
            @if ($errors->has('valoare'))
                <p class="help is-danger" >{{$errors->first('valoare')}}</p>
            @endif
            <br>
      
            <input id="btnAdauga"type="submit" value="Submit">    
        </form>
    </div>
    <h4 id="lView">View table</h4>
        <div class="card-body" background>
            <table class="table table-striped">
            	<tr>
            		<th>Provider Id</th>
            		<th>Product</th>
                    <th>Amount</th>
                    <th>Price</th>
            		<th>Action</th>
            	</tr>
                @foreach ($contracts as $contract)
                    <tr>
                    	<td>
                            {{ $contract->providers_id }}
                                              
                    	</td>
                    	<td>
                            {{$contract->produs}}
                    	</td>
                        <td>
                            {{$contract->cantitate}}
                        </td>
                        <td>
                            {{$contract->valoare}}
                        </td>
                        <td class="text-right">
                            <div id='button-panel'>
                            <form method="GET" action="/contracts/{{$contract->id}}/edit">
                                
                                @csrf
                                   
                                <button type="submit" class="btn btn-primary">Edit </button>
                            </form>
                            <form method="GET" action="/contracts/{{$contract->id}}/delete">

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
    <h4 id="lView">Many to many relationship table</h4>
    <div class="card-body" background>
            <table class="table table-striped">
                <tr>
                    <th>Products_id</th>
                    <th>Contracts_id</th>
                    
                
                </tr>
                @foreach ($contracts_products as $contract_product)
                    <tr>
                        <td>
                            {{ $contract_product->products_id }}
                                              
                        </td>
                        <td>
                            {{$contract_product->contracts_id}}
                        </td>
                        
                        
                    </tr>
                        
                @endforeach    
            </table>

                
        </div>
@endsection