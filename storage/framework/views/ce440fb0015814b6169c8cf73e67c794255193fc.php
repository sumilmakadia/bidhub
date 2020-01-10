<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116420264-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'UA-116420264-1');
    </script>
	<?php echo $__env->make('themes.ino.parts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<style>
	body{
	        font: 400 15px/28px "raleway";
	}
	.slide3-text .slider-text h2 {
    font: 300 60px/72px "raleway";
    }
    .navbar.navbar-default .navbar-collapse .menu li a {
    font: 600 14px/40px "raleway";
    }
    .navbar.navbar-default .nav-right li .g-btn {
    font: 600 14px/38px "raleway";
    }
    .section-title h2 {
        font: 600 35px/60px "raleway";
    }
    .th-h2 {
    font: 400 30px/60px "raleway";
    color: #1a264a;
    }
    .user .user-item p {
        font-family: "raleway";
    }
    .call-action-area .call-action-text {
    font: 400 24px/60px "raleway";
    }
    .reg-btn {
    font: 700 14px/60px "raleway";
    }
    .thm-btn {
    font: 700 14px/58px "raleway";
    }
    .support-item h2 {
    font: 400 24px/40px "raleway";
    }
    .support-item a {
    font: 400 18px/28px "raleway"!important;
    }
    .footer_bottom {
    font: 400 15px/20px "raleway"!important;
    }
    .get_touch .right_inner_content .contact-form .form-control {
    font: 400 15px/28px "raleway"!important;
    }
    .price .pricing-box .pricing-header h2 {
    font: 400 18px/60px "raleway"!important;
    line-height: 28px!important;
    }
    .price .pricing-box .pricing-header .packeg_typ {
    font: 400 55px/60px "raleway"!important;
    }
    .price .pricing-box .pricing-header .packeg_typ small {
    font-family: "raleway"!important;
    }
    .try {
    font: 400 12px/50px "raleway"!important;
    }
    .price .pricing-box .plan-lists li {
    font: 400 18px/40px "raleway"!important;
    line-height: 23px!important;
    margin-top: 20px;
    }
    /*.wht-brdr{*/
    /*    font: 600 14px/38px "Open Sans", sans-serif;*/
    /*    color: #fff;*/
    /*    text-transform: uppercase;*/
    /*    border: 1px solid #fff;*/
    /*    padding: 0px 36px!important;*/
    /*    display: inline-block;*/
    /*    text-align: center;*/
    /*    border-radius: 50px;*/
    /*    margin-left: 22px;*/
    /*    text-shadow: none;*/
    /*    transition: all 400ms linear 0s;*/
    /*}*/
		.call-action-area:after {
			background: none !important;
		}

		.support-area {
			background: none !important;
		}
		.call-action-area:before {
    background-image: -moz-linear-gradient(-15deg, #4281e2 0%, #4281e2 100%);
    background-image: -webkit-linear-gradient(-15deg, #4281e2 0%, #4281e2 100%);
    background-image: -ms-linear-gradient(-15deg, #4281e2 0%, #4281e2c 100%);
}
.thm-btn {
    background: #4281e2;
}
.support-area:before {
background-image: -moz-linear-gradient(-15deg, #4281e2 0%, #4281e2 100%);
    background-image: -webkit-linear-gradient(-15deg, #4281e2 0%, #4281e2 100%);
    background-image: -ms-linear-gradient(-15deg, #4281e2 0%, #4281e2c 100%);
}
.support-item i {
    font-size: 55px;
    color:  #4281e2;
}
.stricky-fixed .navbar.navbar-default .nav-right li a.g-btn {
    border-color: #4281e2;
    color: #4281e2;
}
.support-item a {
    font: 400 18px/28px "Open Sans", sans-serif;
    color: #4281e2;
}
.user .user-item h2 {
    font-size: 24px;
    line-height: 32px;
}
.user .user-item i {
    color: #4281e2;
}
.slider3 {
    
    background-size: cover!important;
    min-height: 100vh;
    padding-top: 0px;
}
.slider3:before {
    opacity: .8!important;
}
@media  only screen and (max-width: 1690px) {
.slider3-subcribe {
    margin-top: 150px;
}
}
@media  only screen and (max-width: 991px) {
.get_touch-area .map {
    width: 100%!important;
}
.support-area {
    padding: 43px 0!important;
}
.features{
        margin-top: 90px!important;
}
.nav-right li {
    display: block;
    margin: 0 0 15px;
}
.navbar-toggle {
    margin-top: 15px;
}
.navbar.navbar-default .navbar-header .navbar-brand img {
    display: inline-block;
    max-width: 100%;
    margin-top: -11px!important;
}
}
@media  only screen and (max-width: 520px) {
.nav-right li + li {
    /*display: none!important;*/
}
}
@media  only screen and (max-width: 450px) {
.slider3-subcribe {
    margin-top: 0px;
}
.navbar.navbar-default .navbar-header .navbar-brand img {
    display: inline-block;
    max-width: 74%;
    margin-top: 0px!important;
}
}
</style>
	
</head>
<body data-scroll-animation="true" style="overflow: visible;">
<!--start preloader area-->
<!--End preloader area-->
<?php echo $__env->make('themes.ino.parts.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--Start searchForm -->


<!-- Start color-plate -->
<?php echo e(Menu('menu_main_loggedout','themes.ino.parts.navigation')); ?>





<!--End header Area-->
<?php echo $__env->yieldContent('content'); ?>
<!--start footer area-->

<!--End footer area-->
<?php echo $__env->make('themes.ino.parts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(Menu('menu_bottom_copyright','themes.ino.parts.footer')); ?>


</body>
</html><?php /**PATH /home/bidhub/bidhub/resources/views/themes/ino/app_ino.blade.php ENDPATH**/ ?>