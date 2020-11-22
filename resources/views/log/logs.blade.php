@extends('layouts.app')

@section('content')
    <style type="text/css">
        
        
        #lView{
            margin-left: 30px;
        }
    </style>
    <h1 align="center" >Logs</h1>

    <h4 id="lView">View table</h4>
        <div class="card-body" background>
            <table class="table table-striped">
            	<tr>
            		<th>Model</th>
            		<th>Id_Model</th>
                    <th>Action</th>
            		
            	</tr>

                @foreach ($logs as $log)
                
                    <tr>
                    	<td>
                            {{ $log->model }}
                                              
                    	</td>
                    	<td>
                            {{$log->id_model}}
                    	</td>
                        <td>
                            {{$log->action}}
                        </td>
                        
                    </tr>
                        
                @endforeach    
            </table>

                
        </div>
    </div>
@endsection