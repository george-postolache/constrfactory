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
	  		
	    	<input type="submit" value="Submit">	
	  	</form>
	</div>
	
@endsection