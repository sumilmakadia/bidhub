@extends('themes.ino.app_ino')

@section('title', 'Membership')

@section('content')

<style>
.purchase-btn {
    color: #fff;
    border: 1px solid #fff;
    background-color: #fb9677;
}
</style>
 <section class="mt-5 advertisecon whiteaft_yellow">
        <div class="container">

<div class="admaintab fixsizefont">
<h2>Memberships</h2>
<p>Any company within the construction industry has the opportunity to choose which level of membership they prefer and if they would like to take advantage of our relaunch special which includes a color Directory advertisement for one full year.</p>
<!--<p>Any company within the construction industry will be given the opportunity to advertise on our site by signing up for an advertising service using one of the advertisement add-on’s mentioned below. We offer three levels to become a member:</p>-->
</div>
<div class="row pt-3">
      
      @foreach($plans as $plan)
      
      <div class="col-sm-4">

      	<div class="card text-xs-center">
        <div class="card-header" style="margin-bottom: 20px;">
          @if($plan->plan_amount != 0.00)
          <h3 class="display-2"><span class="currency">$</span>{{$plan->plan_amount}} <span class="period">/{{$plan->plan_interval}}</span></h3>
			
		  @else
		<h3 class="display-2" style="font-size: 38px;"><span class="currency"></span>Free to Join!</h3>
		 @endif
         
        </div>
        <div class="card-block">
          <h4 class="card-title"> 
           {{$plan->plan_name}}
          </h4>
         	<p>
         		{{$plan->extradesc}}
         	</p>
        </div>
        <a href="/register" class="purchase-btn">Get Started</a>
      </div>
      </div><br>
      
      @endforeach
      
     
      
      
      <div class="col-md-12 pt-4 mt-3 pb-3 fixsizefont"> <p>
          	Joining our C2C community is as easy as 1,2,3! Create your own log in, Choose the membership level that’s right for you, enter your payment information and you are now a part of the future of contracting!
          </p></div>
      
      
      
    </div>  
       
       
       
        </div>
</section>




 <style type="text/css">
 
 .navbar-light .navbar-toggler{border:none !important;     outline: none;}
 
 .whiteaft_yellow .fixsizefont p{font-size:18px;}
 
 .admaintab{margin:20px 0px;}
 
 .card.text-xs-center {
    text-align: center;
}
 .card {
	 border: 0;
	 border-radius: 0px;
	 -webkit-box-shadow: 0 3px 0px 0 rgba(0, 0, 0, 0.08);
	 box-shadow: 0 3px 0px 0 rgba(0, 0, 0, 0.08);
	 transition: all 0.3s ease-in-out;
	 position: relative;
	 will-change: transform;
	 padding: .75rem 1.25rem;
	 box-shadow: 0 20px 35px 0 rgba(0, 0, 0, 0.08);
	 min-height: 423px;
	 margin: 20px 0px;
}
 .card:after {
	 content: "";
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 0%;
	 height: 5px;
	 background-color: #517fdb;
	 transition: 0.5s;
}
 .card:hover {
	 transform: scale(1.05);
	 -webkit-box-shadow: 0 20px 35px 0 rgba(0, 0, 0, 0.08);
	 box-shadow: 0 20px 35px 0 rgba(0, 0, 0, 0.08);
}
 .card:hover:after {
	 width: 100%;
}
 .card .card-header {
	 background-color: white;
	 padding-left: 2rem;
	 border-bottom: 0px;
}
 .card .card-title {
	 margin-bottom: 1rem;
}
 .card .card-block {
	 padding-top: 0;
	 min-height: 274px;
}
 
 .display-2 {
	 font-size: 2.5rem;
	 letter-spacing: -0.1rem;
}
 .display-2 .currency {
	 font-size: 2.2rem;
	 position: relative;
	 font-weight: 400;
	 top: -2px;
	 letter-spacing: 0px;
}
 .display-2 .period {
	 font-size: 1rem;
	 color: #b3b3b3;
	 letter-spacing: 0px;
}
 
 .abouttem .text-left {
    text-align: left!important;
    border-bottom: 1px solid #ccc;
    margin-bottom: 25px;
    box-shadow: 0px 0px 11px 3px #ccc;
    padding: 25px;
}
 .mainimgclas img{width:50%; margin:0px auto;}
 .cuscontent{margin:20px 0px;}
    h2{font-size: 30px;}
    body{font-family: erbaum, sans-serif; font-weight: 200;font-style: normal;}
    
    .whiteaft_yellow{font-size: 20px; padding:60px 0px; }
    .whiteaft_yellow p{font-size: 14px;     line-height: 28px;}
    




    @media only screen and (max-width:780px){
        
           #navbarTogglerDemo03 {
    border-top: 0px;
    box-shadow: none;
    background: #fff;
    padding: 11px;
    position: absolute;
    width: 100%;
    left: 0px;
    top: 56px;
}

#navbarTogglerDemo03 li a{color:#000;}



        .advertisecon.whiteaft_yellow{padding:0px;}
        body,html{overflow-x:hidden;}
        .get_touch .right_inner_content .th-h2{line-height:37px;}
        .sliderdata .lscbtn {margin-top:0px;}
        .carousel button.lscbtn,.sliderdata .lscbtn {
          padding: 5px 7px;
          font-weight: bold;
          text-transform: uppercase;
          font-size: 10px;
          
      }

      .btnimg {
          width: 11px;
          margin: 0px 6px;
      }

      .mobilesearc{background-color: #000;  padding: 24px 60px; width: 100%; margin: 0px auto;}
        .srchlist{display: none;}
        .mobilesearc{display: block;}
       .search-form .form-group:hover,.search-form .form-group.hover, .search-form .form-group {
          width: 90%;
          border-radius: 4px 25px 25px 4px;
          margin-right: 14px;
          margin-bottom: 8px;
           background-color: #fff;
        }

        .search-form .form-group span.form-control-feedback{right: 14px;}
        .srchlist{order: 2;}
        .header{position: relative;}
        
        .btn-outline-light-custom{border: none; color: #fff; margin-left: 4px !important;      }
        .btn-outline-light-custom .fa{display: none;}
        .sliderdata h1,.sliderdata p{font-size: 14px !important; line-height: 19px !important;}
        .img-w-42{width: 80%;}
        .hb .carousel-caption { bottom: 30px !important; font-size: 14px !important; }
        #navbarTogglerDemo03 .navbar-nav{padding-left: 0px !important;  margin-left: 0px !important;}
    }
  
    @media only screen and (max-width:480px){
        .card,.card .card-block{    min-height: auto;}
        .purchase-btn{padding:0px;}
        .yellow-area li, .graybox-area li {font-size: 18px; line-height: 30px;}

        .hb{     background: #000; }
        .sliderdata h1, .sliderdata p{color:#fff; text-shadow: 1px 1px 2px #525252;}
        .carousel-item img{opacity:0.8;}
        .carousel-indicators{ bottom: -17px;}
      .hb .carousel-caption { bottom: -31px !important; font-size: 14px !important; }
      .carousel button.lscbtn,.sliderdata .lscbtn {text-shadow: 1px 1px 3px #fff; padding: 5px 7px 2px 7px;}
    
    }

     
 </style>

	{{--@include('themes.ino.elements.block1')
	@include('themes.ino.elements.block2')
	@include('themes.ino.elements.block4')--}}
	{{--       @include('themes.ino.elements.block3')--}}

	{{--@include('themes.ino.elements.block5')
	       @include('themes.ino.elements.block6')--}}
	{{--       @include('themes.ino.elements.block7')--}}
	
	{{--@include('themes.ino.elements.block9')
	@include('themes.ino.elements.block8')--}}
@endsection
