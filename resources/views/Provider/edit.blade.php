@extends('layouts.app')

@section('content')
	<div>
		<form method="POST" action="/providers/updated">

            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$provider->id}}" >
	    	<label for="pname">Provider's name: </label>
	    	<input type="text" id="pname" name="denumire" value="{{$provider->denumire}}">
	    	@if ($errors->has('denumire'))
                <p class="help is-danger" >{{$errors->first('denumire')}}</p>
            @endif
	  		<label for="phone">Phone number: </label>
	    	<input type="text" id="phone" name="telefon" value="{{$provider->telefon}}">
	    	@if ($errors->has('telefon'))
                <p class="help is-danger" >{{$errors->first('telefon')}}</p>
            @endif
	    	<label for="adr">Address: </label>
	    	<input type="text" id="adr" name="adresa" value="{{$provider->adresa}}">
	    	@if ($errors->has('adresa'))
                <p class="help is-danger" >{{$errors->first('adresa')}}</p>
            @endif	
	    	<input type="submit" value="Submit">
	    	
	  	</form>
	</div>
	
@endsection