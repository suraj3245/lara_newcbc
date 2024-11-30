

<script src="{{ asset('google-jqry.js') }}"></script>


<script src="{{ asset('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>

<script src="{{ asset('dist/js/tabler.min.js?1684106062') }}" defer></script>

<script src="{{ asset('dist/js/demo.min.js?1684106062') }}" defer></script>


<script type="text/javascript">
    $(".fullscreen_button").on("click", function(e) {
        document.fullScreenElement && null !== document.fullScreenElement || !document.mozFullScreen && !document.webkitIsFullScreen ? document.documentElement.requestFullScreen ? document.documentElement.requestFullScreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen && document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
        $(".fullscreen_button i").toggleClass("ti ti-minimize ti ti-maximize");
    });
</script>

<script>
    jQuery(document).ready(function() {
        $(".an-pre-loader").fadeOut("slow");
        closeAlert();
    });

    function closeAlert() {
        setTimeout(function() {
            $("#successAlert").css("display", "none");
            $("#successAlert").removeClass("show");
            $("#wrongAlert").css("display", "none");
            $("#wrongAlert").removeClass("show");
        }, 1000);
    }
</script>
<script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Set the timeout (in milliseconds)
        var timeout = 5000; // 5000 milliseconds = 5 seconds

        // Hide the success message after the specified timeout
        setTimeout(function() {
            $("#successMessage").alert('close');
        }, timeout);
    });
</script>