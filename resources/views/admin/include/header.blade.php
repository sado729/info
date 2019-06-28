<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="/admin/img/avatars/avatar-2.png" class="img-circle"
                                              alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3"
                                                         src="/admin/img/avatars/avatar-2.png"
                                                         alt="user avatar"></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">Sadiq Məmmədov</h6>
                                    <p class="user-subtitle">Sadiqmemmedov93@mail.ru</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <a href="{{route('admin.account.userProfile')}}" title="profile">
                        <li class="dropdown-item">
                            <i class="icon-user mr-2"></i>Profile
                            <span class="badge badge-danger text-white float-right mr-2 p-1">Active</span>
                        </li>
                    </a>
                    <li class="dropdown-divider"></li>
                    <a href="{{route('admin.account.editProfile')}}">
                        <li class="dropdown-item">
                            <i class="icon-pencil mr-2"></i> Edit Profile
                       </li>
                    </a>
                    <li class="dropdown-divider"></li>
                    <a href="#">
                        <li class="dropdown-item">
                            <i class="icon-credit-card mr-2"></i>Payment Methods
                        </li>
                    </a>
                    <li class="dropdown-divider"></li>
                    <a href="#">
                        <li class="dropdown-item">
                            <i class="icon-logout mr-2"></i> Logout
                       </li>
                    </a>
                </ul>
            </li>
        </ul>
    </nav>
</header>