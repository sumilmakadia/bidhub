@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-12">
                <h4 class="text-themecolor">Directory Monthly View Counter</h4>
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
                            
                           
                            <tr><th style="text-transform: uppercase;">Title</th><td class="" >{{ $help->company }}</td></tr>
                            <tr><th style="text-transform: uppercase;">Year</th><td class=""> {{ $help->old_year }},{{ $help->year }} </td></tr>
                            <tr><th style="text-transform: uppercase;">Current Month</th><td class=""> {{ date('F') }}</td></tr>
                            </table>
                             @endforeach
                            @endif  
                            </div>
                            
                            <div class="table-responsive col-md-6">
                            <table class="table table-bordered" style="margin-top: -18px;">
                                
                            
                            <tbody>
                                
                         @if(count($helps) > 0)
                         @foreach($helps as $help)
                            
                            
                            <?php $countchkold = 0;
                            $k=0;
                            
                            echo '<tr><th style="text-transform: uppercase; font-weight: bold; border: none;">MONTH </th><th class="" style=" border: none; font-weight: bold;">NO. OF VIEWS</th></tr>';
                            
                            
                            $arrayofmonth = json_decode($help->json_arraydata,true);
                            
                            foreach($arrayofmonth as $key => $monthnames){
                                $oldyeardatastr = 'old_year_'.$monthnames;
                                $k = $k + $help->$monthnames;
                                echo '<tr><th style="text-transform: uppercase;font-weight:normal; ">'.$monthnames.' - '.$help->$oldyeardatastr.'</th><td class=""><div style="font-weight:normal; width: fit-content; margin: 0px auto; padding:5px 10px; ">'.$help->$monthnames.'</div></td></tr>';
                                
                            }
                            
                            echo '<tr style="background-color: #efefef;"><th style="text-transform: uppercase; font-weight: bold;">Total Views: </th><td class=""><div style="font-weight:bold; width: fit-content; margin: 0px auto; padding:5px 10px; text-align: center;">'.$k.'</div></td></tr>';
                            
                            /*for ($m=12; $m>=1; $m--) {
                                 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                 $oldyeardatastr = 'old_year_'.$month;
                                 if($month == date('F')){
                                     $countchkold = 1;
                                     $k = $k + $help->$month;
                                     echo '<tr><th style="text-transform: uppercase;font-weight:normal; color:red;">'.$month.' - '.$help->$oldyeardatastr.'</th><td class=""><div style="font-weight:normal; width: fit-content; margin: 0px auto; padding:5px 10px; color:red;">'.$help->$month.'</div></td></tr>';
                                 }else{
                                      echo '<tr><th style="text-transform: uppercase;font-weight:normal; ">'.$month.' - '.$help->$oldyeardatastr.'</th><td class=""><div style="font-weight:normal; width: fit-content; margin: 0px auto; padding:5px 10px;">'.$help->$month.'</div></td></tr>';
                                 }
                                 
                                 
                                 }
                                 echo '<tr style="background-color: #efefef;"><th style="text-transform: uppercase; font-weight: bold;">Total Views: </th><td class=""><div style="font-weight:bold; width: fit-content; margin: 0px auto; padding:5px 10px; text-align: center;">'.$k.'</div></td></tr>';*/
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











