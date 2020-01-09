<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<!-- Bootstrap popper Core JavaScript -->
<script src="{{$assets_path_public_eli}}node_modules/popper/popper.min.js"></script>
<script src="{{$assets_path_public_eli}}node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->

<!--Wave Effects -->
<script src="{{$assets_path_public_eli}}dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{$assets_path_public_eli}}dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{$assets_path_public_eli}}dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{$assets_path_public_eli}}node_modules/raphael/raphael-min.js"></script>
<script src="{{$assets_path_public_eli}}node_modules/morrisjs/morris.min.js"></script>
<script src="{{$assets_path_public_eli}}node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="{{$assets_path_public_eli}}node_modules/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="{{$assets_path_public_eli}}dist/js/dashboard1.js"></script>
<!-- Calendar JavaScript -->
{{--<script src="${{assets_path_public_eli}}node_modules/calendar/jquery-ui.s') }}"></script>--}}
<script src="{{$assets_path_public_eli}}node_modules/moment/moment.js"></script>
<script src="{{$assets_path_public_eli}}node_modules/calendar/dist/fullcalendar.min.js"></script>
<script src="{{$assets_path_public_eli}}node_modules/calendar/dist/cal-init.js"></script>
<script type="text/javascript">
    $('#chat, #msg, #comment, #todo').perfectScrollbar();
</script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script type="text/javascript">
    $(function () {

        // sends the uploaded file file to the fielselect event
        $(document).on('change', ':file', function () {
            var input = $(this);
            var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

            input.trigger('fileselect', [label]);
        });

        // Set the label of the uploaded file
        $(':file').on('fileselect', function (event, label) {
            $(this).closest('.uploaded-file-group').find('.uploaded-file-name').val(label);
        });

        // Deals with the upload file in edit mode
        $('.custom-delete-file:checkbox').change(function (e) {
            var self = $(this);
            var container = self.closest('.input-width-input');
            var display = container.find('.custom-delete-file-name');

            if (self.is(':checked')) {
                display.wrapInner('<del></del>');
            } else {
                var del = display.find('del').first();
                if (del.is('del')) {
                    del.contents().unwrap();
                }
            }
        }).change();

        // Sets the validator defaults
        $.validator.setDefaults({
            errorElement: "span",
            errorClass: "help-block",
            highlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.appendTo(element.closest(':not(input, label, .checkbox, .radio)').first());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        // Makes sure any input with the required class is actually required
        $('form').each(function (index, item) {
            var form = $(item);
            form.validate();

            form.find(':input.required').each(function (i, input) {
                $(input).attr('required', true);
            });
        });

    });
</script>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer <?php if($sidebar == true){ echo 'ml-0'; }?>">
    © 2019 Bidhub.com
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
