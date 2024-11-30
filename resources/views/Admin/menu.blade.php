<header class="navbar navbar-expand-md navbar-light d-print-none" style="position: sticky; top:0px; z-index:100;">
    <div class="container-xl">
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="#!">
                <img src="{{ asset('images/cbc_logo.png') }}" height="60" class="">
            </a>
        </h1>

        <div class="navbar-nav flex-row order-md-last">

            <a href="" class="nav-link px-1" data-bs-toggle="modal" data-bs-target="#modal-menu">
                <i class="ti ti-layout-2" style="font-size: 30px;"></i>
            </a>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm">
                        <i class="ti ti-user" style="font-size: 25px;"></i>
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        {{-- <div>{{ ucfirst($loggedInJobseeker->full_name) }}</div> --}}
                        <div class="mt-1 small text-muted">Admin</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    {{-- <a href="../user_settings/" class="dropdown-item"><i class="ti ti-settings px-1"></i> User settings</a> --}}
                    <a href="../user_profile/" class="dropdown-item"><i class="ti ti-user-circle px-1"></i> User profile</a>
                    <a href="{{route("admin.change.password")}}" class="dropdown-item"><i class="ti ti-lock-open px-1"></i> Change Password</a>
                    <a href="{{route('admin.logout')}}" class="dropdown-item"><i class="ti ti-logout px-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
$BtnClrCLs = ['success', 'danger', 'warning', 'primary', 'info', 'dark', 'secondary'];
?>

<style>
    .an_Menu_btn i {
        font-size: 50px;
        display: block;
    }

    .an_Menu_btn div span {
        font-size: 16px;
        display: block;
    }

    .clsx {
        padding: 0px 18px !important;
    }

    .clsx a {
        width: 100% !important;
    }
</style>


<div class="modal modal-blur fade" id="modal-menu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">

                <!-- <div class="container"> -->
                <div class="row justify-content-md-center">

                    <div class="col-6 col-md-3 my-3 clsx">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-{{ $BtnClrCLs[array_rand($BtnClrCLs, 1)] }} an_Menu_btn">
                            <div>
                                <i class="ti ti-dashboard"></i>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </div>
<?php

$menusList = [


[
        'name' => 'Sub Users',
        'link' => route('subuser.index'),
        'icon' => 'users',
        'permission' => 'Sub Users-open'
    ],
    [
        'name' => ' User roles',
        'link' => route('roles.index'),
        'icon' => 'user-check',
        'permission' => 'User Roles-open'
    ],
    // [
    //     'name' => ' Permissions',
    //     'link' => route('permissions.index'),
    //     'icon' => 'user-check',
    //     'permission' => 'Permissions-open'
    // ],
    [
        'name' => 'Students',
        'link' => route('students.index'),
        'icon' => 'user-check',
        'permission' => 'Students-open'
    ],


];
?>
                    @foreach ($menus as $menu)
                    @can($menu['permission'])
                    <div class="col-6 col-md-3 my-3 clsx">
                        <a href="{{ $menu['link'] }}" class="btn btn-{{ $BtnClrCLs[array_rand($BtnClrCLs, 1)] }} an_Menu_btn">
                            <div>
                                <i class="ti ti-{{ $menu['icon'] }}"></i>
                                <span>{{ $menu['name'] }}</span>
                            </div>
                        </a>
                    </div>
                    @endcan
                    @endforeach



                </div>

                <!-- </div> -->

            </div>

        </div>
    </div>
</div>
