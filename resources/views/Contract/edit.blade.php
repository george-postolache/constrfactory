@extends('layouts.app')

@section('content')
    
	<div>
		<form method="POST" action="/contracts/updated">

            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$contract->id}}" >
            <label for="id" id="cid">Provider id </label>
            <select name="furnizor_id" id="id">
                <option value="{{$contract->furnizor_id}}">{{$contract->furnizor_id}}</option>
                @foreach ($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->id}}</option>
                      
                @endforeach
            </select>

            <label for="pro">Product's name </label>
            <input type="text" id="pro" name="produs" value="{{$contract->produs}}">
            @if ($errors->has('produs'))
                <p class="help is-danger" >{{$errors->first('produs')}}</p>
            @endif

            <label for="cant">Amount </label>
            <input type="text" id="cant" name="cantitate" value="{{$contract->cantitate}}">
            @if ($errors->has('cantitate'))
                <p class="help is-danger" >{{$errors->first('cantitate')}}</p>
            @endif
 
            <label for="pr">Price </label>
            <input type="text" id="pr" name="valoare" value="{{$contract->valoare}}">
            @if ($errors->has('valoare'))
                <p class="help is-danger" >{{$errors->first('valoare')}}</p>
            @endif

            
	    	<input type="submit" value="Submit">	
	  	</form>
	</div>
	
@endsection