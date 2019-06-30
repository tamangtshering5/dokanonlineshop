<!-- footer content -->
</div>
<script>
    var url='{{URL::to('/')}}';
    var token='{{csrf_token()}}'

</script>
<footer>
    <div class="pull-right">
        License to  <a href="http://dokanonlineshopping.com/" target="_blank">dokanonlineshopping.com</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
{{--
<script src="{{URL::to('backend/js/jquery.js')}}"></script>
--}}
<script src="{{URL::to('backend/js/scripts.js')}}"></script>

<!-- Bootstrap -->
<script src="{{URL::to('backend/js/bootstrap.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{URL::to('backend/js/sweetalert.js')}}"></script>
<script src="{{URL::to('backend/js/alertify.js')}}"></script>
<!-- Custom js -->
<script src="{{URL::to('backend/js/custom.js')}}"></script>
<script>
    var url='{{URL::to('/')}}';
    var token='{{csrf_token()}}'

</script>

</body>
</html>
