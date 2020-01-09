<div class="right-sidebar ps ps--theme_info " style="display: block;">
	<div class="slimscrollright">
		@yield('modal_body')
	</div>
	<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
		<div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;">

		</div>
	</div>
	<div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
		<div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;">

		</div>
	</div>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery("#modal").on("click", function () {
            jQuery(".right-sidebar").toggleClass('shw-rside');
        });
        jQuery(".page-wrapper").on("click", function () {
            jQuery(".right-sidebar").removeClass('shw-rside');
        });
    });
</script>