<!doctype html>
<html lang="en">

<head>
    @include('head_tag')
    <title>{{$APP_TITLE}} | Admin Dashboard  </title>

</head>

<body>

    <div class="an-pre-loader"></div>

    <div class="page">

        @include('Admin.menu')


        <div class="page-wrapper">

            <div class="page-body">
                <div class="container-xl">
                    <?php
                    $BtnClrCLs = ['success', 'danger', 'warning', 'primary', 'info', 'dark', 'secondary'];
                    ?>



                    <div class="row justify-content-md-center">
                        {{-- @can('Categories-open')
                    <div class="col-6 col-md-3 my-3 clsx">

                        <a href="" class="btn btn-{{ $BtnClrCLs[array_rand($BtnClrCLs, 1)] }} an_Menu_btn">
                            <div>
                                <i class="ti ti-dashboard"></i>
                                <span>Categories</span>
                            </div>
                        </a>


                    </div>
                    @endcan --}}
                    {{-- @foreach (auth()->user()->getAllPermissions() as $permission)
                    {{ $permission->name }}<br>
                @endforeach --}}

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
    [
        'name' => 'Students',
        'link' => route('students.index'),
        'icon' => 'user-check',
        'permission' => 'Students-open'
    ],
    [
        'name' => ' Permissions',
        'link' => route('permissions.index'),
        'icon' => 'user-check',
        'permission' => 'Permissions-open'
    ],

];
?>
                    @foreach ($menus as $menu)
                    @can($menu['permission'])
                    <div class="col-6 col-md-3 my-3 clsx">
                        <a href="{{ route($menu['link']) }}" class="btn btn-{{ $BtnClrCLs[array_rand($BtnClrCLs, 1)] }} an_Menu_btn">
                            <div>
                                <i class="ti ti-{{ $menu['icon'] }}"></i>
                                <span>{{ $menu['name'] }}</span>
                            </div>
                        </a>
                    </div>
                    @endcan
                    @endforeach



                </div>




                </div>
            </div>

            <!-- FOOTER HERE -->

        </div>
    </div>

    @include('footer_tag')


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('select-tags'), {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render: {
                    item: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
        });
    </script>



</body>

</html>
