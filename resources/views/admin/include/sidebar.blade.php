<div id="sidebar-wrapper" data-simplebar="init" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="javaScript:void(0);">
            <img src="/admin/img/logo-icon.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Admin Panel</h5>
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-cent`er user-pointer collapsed" data-toggle="collapse"
             data-target="#user-dropdown">
            <div class="avatar">
                <img class="mr-3 side-user-img" src="/admin/img/avatars/avatar-2.png" alt="user avatar"></div>
            <div class="media-body">
                <h6 class="side-user-name">{{ $admin->name }}</h6>
                <a href="javascript:void(0);"><i class="fa fa-circle text-success mx-1"></i>{{ $admin->role->name }}</a>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <ul class="user-setting-menu">
                <li><a href="{{ route('logout') }}"><i class="icon-power"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    @if($admin->isAdmin || $admin->isDeveloper)
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">ADMIN MANAGEMENT PANEL</li>

        <li>
            <a href="{{route('admin.index')}}" class="waves-effect">
                <i class="zmdi fa fa-home"></i> <span>Home</span>
            </a>
        </li>

{{--        <li>--}}
{{--            <a href="{{ route('menu.admin.index') }}" class="waves-effect">--}}
{{--                <i class="zmdi  zmdi-view-dashboard"></i> <span>Menu</span>--}}
{{--            </a>--}}
{{--        </li>--}}


{{--        <li>--}}
{{--            <a href="{{ route('faq.admin.index') }}" class="waves-effect">--}}
{{--                <i class="fa fa-question"></i> <span>Faq</span>--}}
{{--            </a>--}}
{{--        </li>--}}

        <li>
            <a href="{{ route('news.admin.index') }}" class="waves-effect">
                <i class="zmdi zmdi-device-hub"></i> <span>Xəbərlər</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.statistic',1) }}" class="waves-effect">
                <i class="fa fa-signal"></i> <span>Statistic</span>
            </a>
        </li>

{{--        <li>--}}
{{--            <a href="{{ route('service.admin.index') }}" class="waves-effect">--}}
{{--                <i class="fa fa-gears"></i> <span>Service</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('why.admin.index') }}" class="waves-effect">--}}
{{--                <i class="fa fa-question-circle-o"></i> <span>Why</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('admin.package') }}" class="waves-effect">--}}
{{--                <i class="fa fa-cubes"></i> <span>Package</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a href="{{ route('information.admin.edit') }}" class="waves-effect">
                <i class="zmdi zmdi-puzzle-piece"></i> <span>Setttings</span>
            </a>
        </li>
    </ul>
    @endif

</div>