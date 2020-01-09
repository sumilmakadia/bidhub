<section class="footer_widget">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                	<div><img src="{{asset('public/assets/landings/eli/images/bidhub.png')}}" class="foot_logo"></div>
                	<div>Welcome to BidHub! We are the nation’s only online resource dedicated to....</div>
                	<div><a href="{{url('/about-us')}}" class="rdmore">Read More</a></div>
                </div>
                <div class="col-md-4">
                	<h6>Quick Links</h6>
                	<div class="row quicklink">
                	<div class="col-md-6">
                		<ul>
                		<li><a href="{{url('/')}}">Home</a></li>
                		<li><a href="{{url('/about-us')}}">About BidHub</a></li>
                		<li><a href="{{url('/membership')}}">Membership</a></li>
                		
                		
                	</ul>
                	</div>
                	
                </div>


                </div>
                <div class="col-md-4">
                	<h6>Contact Us</h6>
                	<ul>
                		<li><i class="fa fa-map-marker"></i>&nbsp; {{setting('home.location_35')}}</li>
                		<li><i class="fa fa-phone"></i>&nbsp; {{setting('home.location_33')}}</li>
                		<li><i class="fa fa-envelope"></i>&nbsp; info@bidhub.com</li>
                	</ul>
                	<div class="foot_social">
                		<a href="#" class="firstmar align-self-center"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube"></i></a>
                	</div>

                </div>
            </div>
        </div>
</section>

<style type="text/css">
.foot_social a.firstmar{margin-left:0px;}
.foot_social a {
    margin: 0px 5px;
}
	.footer_widget{background-color: #006a94; color: #dee2e6; padding:40px 0px;}
	.rdmore{font-weight:bold}
	.footer_widget li,.footer_widget a{color: #dee2e6;     line-height: 33px;}
	.foot_logo{padding:15px 0px; width: 50%;}
	.footer_widget h6{padding-bottom: 20px;}
	.foot_social .fa{background-color: #fff; border-radius: 90px; color:#006a93; width: 30px; height: 30px; text-align: center; padding: 7px;}
	
	
	 @media only screen and (max-width:991px){
        
        .navbar-collapse {
            border-top: 0px;
            box-shadow: none;
            background: #fff;
            padding: 11px;
        }
        
        header .navbar-light .navbar-nav .nav-link:hover,.btn.btn-outline-light-custom:hover{color:#ccc;}
	     
	 }
	 @media only screen and (max-width:780px){
        
.footer_widget h6 {
    padding-bottom: 0px;
    padding-top: 20px;
}

.footer_widget .quicklink ul {
    margin-bottom: 0px;
}

header .navbar-light .navbar-nav .nav-link{color: #fff;}
	     
	     
	 }
	
</style>


<script type="text/javascript" src="{{$assets_path_public}}/js/jquery-2.2.4.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--waypoint js-->
<script type="text/javascript" src="{{$assets_path_public}}/vendors/waypoints/waypoints.min.js"></script>
<!--nav js-->
<script type="text/javascript" src="{{$assets_path_public}}/js/jquery-nav.js"></script>
<!--counterup js-->
<script type="text/javascript" src="{{$assets_path_public}}/vendors/counterup/jquery.counterup.min.js"></script>
<!--isotope js-->
<script type="text/javascript" src="{{$assets_path_public}}/vendors/isotope/isotope-min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/js/jquery.stellar.js"></script>
<!--imagesloaded js-->

<script type="text/javascript" src="{{$assets_path_public}}/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
<!--magnific js-->
<script type="text/javascript" src="{{$assets_path_public}}/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/js/plugins.js"></script>
<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/revolution-addons/countdown/revolution.addon.countdown.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<!--wow js-->
<script type="text/javascript" src="{{$assets_path_public}}/js/wow.min.js"></script>
<!-- owl JS Files -->
<script type="text/javascript" src="{{$assets_path_public}}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{$assets_path_public}}/js/custom.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
 
$('.carousel').carousel({
  interval: 1000 * 3,
  pause: "false"
});

</script>


<style type="text/css">
    @media (min-width: 1367px){.h-dark-testi{padding:9rem 10rem 12rem 12rem}}@media (max-width: 767.98px){.hb .followus{display:none}}@media (max-width: 991.98px){.hb .carousel-caption{padding-bottom:15%}.skillgap-bg{background:none;text-align:center}.h-dark-testi{position:relative;padding:5rem}.h-red-testi{padding:5rem;margin-right:0}.approch-bg .enskill{position:relative;width:100%;padding:5rem;top:0}}@media (min-width: 993px) and (min-width: 1024px){.h-dark-testi{padding:4rem 8rem}}

/*# sourceMappingURL=rwd.css.map */


/*# sourceMappingURL=style.css.map */
</style>

<script type="text/javascript">
    $(window).scroll(function(){
    $(".hb").css("opacity", 1 - $(window).scrollTop() / 850);
  });
</script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>