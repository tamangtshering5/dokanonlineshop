<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{URL::to('frontend/js/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/jqzoom.js')}}"></script>
<script type="text/javascript">
    $("#bzoom").zoom({
        zoom_area_width: 400,
        autoplay_interval :3000,
        small_thumbs : 4,
        autoplay : false
    });
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

<script src="{{URL::to('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('frontend/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{URL::to('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::to('frontend/js/countdown.js')}}"></script>
<script src="{{URL::to('frontend/js/countdown.min.js')}}"></script>
<script src="{{URL::to('frontend/js/echo.min.js')}}"></script>
<script src="{{URL::to('frontend/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{URL::to('frontend/js/bootstrap-slider.min.js')}}"></script>
<script src="{{URL::to('frontend/js/jquery.rateit.min.js')}}"></script>
<script src="{{URL::to('frontend/js/lightbox.min.js')}}"></script>
<script src="{{URL::to('frontend/js/bootstrap-select.min.js')}}"></script>
<script src="{{URL::to('frontend/js/wow.min.js')}}"></script>
<script src="{{URL::to('frontend/js/scripts.js')}}"></script>


        <!--<script>
            function getTimeRemaining(endtime) {
                var t = Date.parse(endtime) - Date.parse(new Date());
                var seconds = Math.floor((t / 1000) % 60);
                var minutes = Math.floor((t / 1000 / 60) % 60);
                var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                return {
                    'total': t,
                    'days': days,
                    'hours': hours,
                    'minutes': minutes,
                    'seconds': seconds
                };
            }

            function initializeClock(id, endtime) {
                var clock = document.getElementById(id);
                var daysSpan = clock.querySelector('.days');
                var hoursSpan = clock.querySelector('.hours');
                var minutesSpan = clock.querySelector('.minutes');
                var secondsSpan = clock.querySelector('.seconds');

                function updateClock() {
                    var t = getTimeRemaining(endtime);

                    daysSpan.innerHTML = t.days;
                    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                    if (t.total <= 0) {
                        clearInterval(timeinterval);
                    }
                }

                updateClock();
                var timeinterval = setInterval(updateClock, 1000);
            }

            var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
            initializeClock('clockdiv', deadline);
        </script>-->
        
        

</body>

</html>