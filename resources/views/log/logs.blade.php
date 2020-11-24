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
            		<th>Action Id</th>
            		<th>Model Id</th>
                    <th>Model</th>
            		
            	</tr>

                @foreach ($logs as $log)
                
                    <tr>
                    	<td>
                            {{ $log->logs_id }}
                                              
                    	</td>
                    	<td>
                            {{$log->loggable_id}}
                    	</td>
                        <td>
                            {{$log->loggable_type}}
                        </td>
                        
                    </tr>
                        
                @endforeach    
            </table>

                
        </div>
    </div>
@endsection