<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('cms.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>S</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Base</b>Skeleton</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                {{--<li class="dropdown messages-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-envelope-o"></i>--}}
                        {{--<span class="label label-success">4</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">You have 4 messages</li>--}}
                        {{--<li>--}}
                            {{--<!-- inner menu: contains the actual data -->--}}
                            {{--<ul class="menu">--}}
                                {{--<li><!-- start message -->--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle"--}}
                                                 {{--alt="User Image">--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Support Team--}}
                                            {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<!-- end message -->--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{ asset('img/user3-128x128.jpg') }}" class="img-circle"--}}
                                                 {{--alt="User Image">--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--AdminLTE Design Team--}}
                                            {{--<small><i class="fa fa-clock-o"></i> 2 hours</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{ asset('img/user4-128x128.jpg') }}" class="img-circle"--}}
                                                 {{--alt="User Image">--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Developers--}}
                                            {{--<small><i class="fa fa-clock-o"></i> Today</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{ asset('img/user3-128x128.jpg') }}" class="img-circle"--}}
                                                 {{--alt="User Image">--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Sales Department--}}
                                            {{--<small><i class="fa fa-clock-o"></i> Yesterday</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{ asset('img/user4-128x128.jpg') }}" class="img-circle"--}}
                                                 {{--alt="User Image">--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Reviewers--}}
                                            {{--<small><i class="fa fa-clock-o"></i> 2 days</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<!-- Notifications: style can be found in dropdown.less -->--}}
                {{--<li class="dropdown notifications-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-bell-o"></i>--}}
                        {{--<span class="label label-warning">10</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">You have 10 notifications</li>--}}
                        {{--<li>--}}
                            {{--<!-- inner menu: contains the actual data -->--}}
                            {{--<ul class="menu">--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-warning text-yellow"></i> Very long description here that may--}}
                                        {{--not fit into the--}}
                                        {{--page and may cause design problems--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-users text-red"></i> 5 new members joined--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-shopping-cart text-green"></i> 25 sales made--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-user text-red"></i> You changed your username--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="footer"><a href="#">View all</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<!-- Tasks: style can be found in dropdown.less -->--}}
                {{--<li class="dropdown tasks-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-flag-o"></i>--}}
                        {{--<span class="label label-danger">9</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">You have 9 tasks</li>--}}
                        {{--<li>--}}
                            {{--<!-- inner menu: contains the actual data -->--}}
                            {{--<ul class="menu">--}}
                                {{--<li><!-- Task item -->--}}
                                    {{--<a href="#">--}}
                                        {{--<h3>--}}
                                            {{--Design some buttons--}}
                                            {{--<small class="pull-right">20%</small>--}}
                                        {{--</h3>--}}
                                        {{--<div class="progress xs">--}}
                                            {{--<div class="progress-bar progress-bar-aqua" style="width: 20%"--}}
                                                 {{--role="progressbar" aria-valuenow="20" aria-valuemin="0"--}}
                                                 {{--aria-valuemax="100">--}}
                                                {{--<span class="sr-only">20% Complete</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<!-- end task item -->--}}
                                {{--<li><!-- Task item -->--}}
                                    {{--<a href="#">--}}
                                        {{--<h3>--}}
                                            {{--Create a nice theme--}}
                                            {{--<small class="pull-right">40%</small>--}}
                                        {{--</h3>--}}
                                        {{--<div class="progress xs">--}}
                                            {{--<div class="progress-bar progress-bar-green" style="width: 40%"--}}
                                                 {{--role="progressbar" aria-valuenow="20" aria-valuemin="0"--}}
                                                 {{--aria-valuemax="100">--}}
                                                {{--<span class="sr-only">40% Complete</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<!-- end task item -->--}}
                                {{--<li><!-- Task item -->--}}
                                    {{--<a href="#">--}}
                                        {{--<h3>--}}
                                            {{--Some task I need to do--}}
                                            {{--<small class="pull-right">60%</small>--}}
                                        {{--</h3>--}}
                                        {{--<div class="progress xs">--}}
                                            {{--<div class="progress-bar progress-bar-red" style="width: 60%"--}}
                                                 {{--role="progressbar" aria-valuenow="20" aria-valuemin="0"--}}
                                                 {{--aria-valuemax="100">--}}
                                                {{--<span class="sr-only">60% Complete</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<!-- end task item -->--}}
                                {{--<li><!-- Task item -->--}}
                                    {{--<a href="#">--}}
                                        {{--<h3>--}}
                                            {{--Make beautiful transitions--}}
                                            {{--<small class="pull-right">80%</small>--}}
                                        {{--</h3>--}}
                                        {{--<div class="progress xs">--}}
                                            {{--<div class="progress-bar progress-bar-yellow" style="width: 80%"--}}
                                                 {{--role="progressbar" aria-valuenow="20" aria-valuemin="0"--}}
                                                 {{--aria-valuemax="100">--}}
                                                {{--<span class="sr-only">80% Complete</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<!-- end task item -->--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="footer">--}}
                            {{--<a href="#">View all tasks</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li title="View Front Page"><a href="{{ url('/') }}" target="_blank">
                        <i class="fa fa-lg fa-crosshairs" aria-hidden="true"></i></a></li>
                <!-- Language selector -->
                {{--<li class="dropdown" title="Change CMS Page Language">--}}
                    <?php //$lCms = App\Setting::getSiteConfigValue('cms_page_language') ?>
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<span class="flag-icon flag-icon-{{ App\Setting::$languages[$lCms]['flag'] }}"></span>--}}
                        {{--{{ App\Setting::$languages[$lCms]['name'] }} <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--@foreach (App\Setting::$languages as $code => $label)--}}
                            {{--<li><a href="{{ route('cms.language', $code) }}">--}}
                                    {{--<span class="flag-icon flag-icon-{{ $label['flag'] }}"></span> {{ $label['name'] }}--}}
                                {{--</a></li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ auth()->user()->avatar_image }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->display_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ auth()->user()->avatar_image }}" class="img-circle" alt="User Image">

                            <p>
                                {{ auth()->user()->display_name }} - {{ auth()->user()->role_name }}
                                <small>Member since {{ auth()->user()->created_at }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                    {{--<li class="user-body">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Followers</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Sales</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Friends</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.row -->--}}
                    {{--</li>--}}
                    <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('cms.users.edit', auth()->user()->id) }}" class="btn btn-default btn-flat">
                                    <i class="fa fa-user-secret"></i> Profile</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{ url('/cms/logout') }}" method="post">
                                    {{ csrf_field() }}

                                    <button class="btn btn-default btn-flat">
                                        <i class="fa fa-sign-out"></i> Sign out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>