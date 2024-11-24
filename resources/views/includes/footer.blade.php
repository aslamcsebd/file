
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- Bootstrap v4.6.0 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

{{-- Pushmenu --}}
<script src="{{ asset('js/custom.js') }}"></script>

{{-- dataTables --}}
<script src="{{ asset('js/dataTables.min.js') }}"></script>

<!-- summernote -->
<script src="{{ asset('/') }}summernote/summernote.min.js"></script>

<!-- Datepicker -->
{{-- <script src="{{ asset('/') }}js/datepicker.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0) { //default: 40
            $('#navbar_top').addClass("fixed-top");
            $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
        } else {
            $('#navbar_top').removeClass("fixed-top");
            $('body').css('padding-top', '0');
        }
    });

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);

    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });

    // Status change
    $(document).ready(function() {
        $('.status').change(function() {

            let model = $(this).data('model');
            let field = $(this).data('field');
            let id = $(this).data('id');
            let tab = $(this).data('tab');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ url('/status/update') }}',
                data: {
                    'model': model,
                    'field': field,
                    'id': id,
                    'tab': tab
                },
                success: function(data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(data.message);
                }
            });
        });
    });

    // Previous
    let prev = document.querySelector('.page-item[aria-label="« Previous"] .page-link, .page-item .page-link[rel="prev"]');
    prev ? prev.textContent = '< Prev' : '';

    // Next
    let next = document.querySelector('.page-item[aria-label="Next »"] .page-link, .page-item .page-link[rel="next"]');
    next ? next.textContent = 'Next >' : '';    
</script>