@extends('themes.ino.app_ino')

@section('title', 'How it works')

@section('content')


 <section class="mt-5 aboutcon whiteaft_yellow">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12"> 
                
                <h2>How it works:</h2>
                
                <div class="cuscontent">
                <p>Bidhub is for the Contracting community and the Homeowners that they serve. Homeowners can find local contractors using our convenient Directory and the search tools provided to make it easier for them. They may post projects in our Project Room for jobs that they need bids on for them to be completed and they may post Building materials and Equipment for sale as well. ALL FOR FREE </p>
                 
                 <p>Builders/Developers/General Contractors and Homeowners and Owner builders may post projects in our Project Room for them to receive bids on. All for free as well.</p>
                 <p>SubContractors may bid on as many projects as they choose from the Project Room by signing up for a monthly subscription. No longer do they have the incredibly high cost of paying per click for each lead or project to bid on! <br>They may also view the Directory, Help Wanted and Building Materials and Equipment sections at absolutely no cost to them.
</p>
                
                <p>Local advertisers can advertise in our Directory to gain exposure to the homeowners, Contractors and other merchants that help their businesses </p>
                 <p>Everyone has the ability to purchase ads to be posted in our Help Wanted section by signing up for the low fees offered based on the amount of ads they need to post.</p>
                 </div>
                    
                    
                    <div class="text-center" style="padding: 20px 0px;"><a href="{{url('/register')}}" class="btn btn-primary">Register Now</a></div>
    
                </div>
            </div>
            
            
        
           
            
       

        </div>


        
        
</section>


 <style type="text/css">
 
 
 .navbar-light .navbar-toggler{border:none !important;     outline: none;}
 
 
 .abouttem .text-left {
    text-align: left!important;
    border-bottom: 1px solid #ccc;
    margin-bottom: 25px;
    box-shadow: 0px 0px 11px 3px #ccc;
    padding: 25px;
        display: flex;
    align-items: center;
}
 .mainimgclas img{width:80%; margin:0px auto;}
 .cuscontent{margin:20px 0px;}
    h2{font-size: 30px;}
    body{font-family: erbaum, sans-serif; font-weight: 200;font-style: normal;}
    
    .whiteaft_yellow{font-size: 20px; padding:60px 0px; }
    .whiteaft_yellow p{font-size: 18px;}
    




    @media only screen and (max-width:780px){
         .mainimgclas img{width:100%;}
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


        .mainimgclas{width:100%;}
        .aboutcon.whiteaft_yellow{padding:0px;}
        
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
        
        .yellow-area li, .graybox-area li {font-size: 18px; line-height: 30px;}

        .hb{     background: #000; }
        .sliderdata h1, .sliderdata p{color:#fff; text-shadow: 1px 1px 2px #525252;}
        .carousel-item img{opacity:0.8;}
        .carousel-indicators{ bottom: -17px;}
      .hb .carousel-caption { bottom: -31px !important; font-size: 14px !important; }
      .carousel button.lscbtn,.sliderdata .lscbtn {text-shadow: 1px 1px 3px #fff; padding: 5px 7px 2px 7px;}
    
    }

     
 </style>

	
@endsection
