@extends('layouts.app')

@section('content')
    
	<div>
		<form method="POST" action="/products/updated">

            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$product->id}}" >
	    	<label for="pname">Product's name: </label>
	    	<input type="text" id="pname" name="name" value="{{$product->name}}">
            @if ($errors->has('name'))
                <p class="help is-danger" >{{$errors->first('name')}}</p>
            @endif
	  		<label for="id" id="cid">Contract's id: </label>
            <select name="id_contract" id="id">
                <option value="{{$product->id_contract}}">{{$product->id_contract}}</option>;
                @foreach ($contracts as $contract)
                    <option value="{{$contract->id}}">Id:{{$contract->id}} - Produs:{{$contract->produs}} - Furnizor:{{$contract->furnizor_id}}</option>;
                    
                    
                @endforeach
                <option></option>;
            </select>
	    	<input type="submit" value="Submit">	
	  	</form>
	</div>
	
@endsection