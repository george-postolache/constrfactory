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
    <h1 align="center" >Providers</h1>
    <h4 id="lAdd">Add Provider</h4>
    <div id="add">
        <form method="POST" action="/providers">
            @csrf
            
            <label for="pname">Provider's name </label>
            <input type="text" id="pname" name="denumire" value="{{old('denumire')}}">
            @if ($errors->has('denumire'))
                <p class="help is-danger" >{{$errors->first('denumire')}}</p>
            @endif
            <br>
            <label for="phone">Phone number </label>
            <input type="text" id="phone" name="telefon" value="{{old('telefon')}}">
            @if ($errors->has('telefon'))
                <p class="help is-danger" >{{$errors->first('telefon')}}</p>
            @endif
            <br>
            <label for="adr">Address </label>
            <input type="text" id="adr" name="adresa" value="{{old('adresa')}}">
            @if ($errors->has('adresa'))
                <p class="help is-danger" >{{$errors->first('adresa')}}</p>
            @endif
            <br>
      
            <input id="btnAdauga"type="submit" value="Submit">    
        </form>
    </div>
    <h4 id="lView">View table</h4>
        <div class="card-body" background>
            <table class="table table-striped">
            	<tr>
            		<th>Name</th>
            		<th>Phone</th>
                    <th>Address</th>
            		<th>Action</th>
            	</tr>
                @foreach ($providers as $provider)
                    <tr>
                    	<td>
                            {{ $provider->denumire }}
                                              
                    	</td>
                    	<td>
                            {{$provider->telefon}}
                    	</td>
                        <td>
                            {{$provider->adresa}}
                        </td>
                        <td class="text-right">
                            <div id='button-panel'>
                            <form method="GET" action="/providers/{{$provider->id}}/edit">
                                
                                @csrf
                                   
                                <button type="submit" class="btn btn-primary">Edit </button>
                            </form>
                            <form method="GET" action="/providers/{{$provider->id}}/delete">

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