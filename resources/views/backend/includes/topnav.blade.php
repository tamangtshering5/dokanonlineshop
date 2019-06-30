<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>


            <ul class="nav navbar-nav navbar-right">
                <li class="user-header">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">

                    <img src="{{URL::to('backend/userimg/'.Auth::user()->image)}}"  class="img-circle" alt="User Image">


                    {{Auth::user()->name}}


                <span class=" fa fa-angle-down"></span>
                    </a>


                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{route('admin-profile',['id'=>Auth::user()->id])}}"> <i class="fa fa-wrench pull-right"></i> Profile</a></li>
                        <li><a href="{{route('logout')}}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             <i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="unseen badge bg-green"></span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
<script>

    $(document).ready(function () {
//notification
        function load_unseen_notification() {
            var sendData = {
                _token: token
            };
            $.ajax({
                url: url + '/Dashboard/allbooking-message',
                method: 'POST',
                data: sendData,
                success: function (data) {
                    console.log(data);
                    $('#menu1').html(data.data);
                    if (data.count > 0) {
                        $('.unseen').html(data.count);
                    }
                }
            });
        };
        load_unseen_notification();

    });


</script>