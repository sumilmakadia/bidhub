@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-12">
                <h4 class="text-themecolor">Help Wanted Monthly View Counter</h4>
            </div>
            </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">
                        
                       
           
                        <div class="table-responsive col-md-6">
                            
                            <table class="table table-bordered" style="">
                                
                            
                            <tbody>
                         @if(count($helps) > 0)
                         @foreach($helps as $help)
                            
                           
                            <tr><th style="text-transform: uppercase;">Title</th><td class="" >{{ $help->title }}</td></tr>
                            <tr><th style="text-transform: uppercase;">Year</th><td class=""> {{ $help->old_year }},{{ $help->year }} </td></tr>
                            <tr><th style="text-transform: uppercase;">Current Month</th><td class=""> {{ date('F') }}</td></tr>
                            </table>
                             @endforeach
                            @endif  
                            </div>
                            
                            <div class="table-responsive col-md-6">
                            <table class="table table-bordered" style="">
                                
                            
                            <tbody>
                                
                         @if(count($helps) > 0)
                         @foreach($helps as $help)
                            
                            
                            <?php $countchkold = 0;
                            $k=0;
                            for ($m=1; $m<=12; $m++) {
                                 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                 
                                 if($month == date('F')){
                                     $countchkold = 1;
                                     $k = $k + $help->$month;
                                     echo '<tr><th style="text-transform: uppercase;">'.$month.' - '.$help->year.'</th><td class=""><div style="font-weight:bold; width: fit-content; margin: 0px auto; padding:5px 10px; border:1px solid lightgray; text-align: center; background-color:red; color:white;">'.$help->$month.'</div></td></tr>';
                                 }
                                 
                                 
                                 }
                                 echo '<tr><th style="text-transform: uppercase;">Total Visitor: </th><td class=""><div style="font-weight:bold; width: fit-content; margin: 0px auto; padding:5px 10px; border:1px solid lightgray; text-align: center; background-color:red; color:white;">'.$k.'</div></td></tr>';
                            ?>
                            
                                    
                                
                                @endforeach
                             @else
                        
                            <tr><td colspan="15">No record found !..</td></tr>

                            @endif  
                                
                                </tbody>
                            </table>
                          

                        </div>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











