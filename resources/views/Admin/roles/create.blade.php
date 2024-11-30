<!doctype html>
<html lang="en">

<head>
    @include('head_tag')
    <title>{{$APP_TITLE}} | Admin | Create Roles</title>
</head>

<body>

    <div class="an-pre-loader"></div>

    <div class="page">

        @include('Admin.menu')
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
        <div class="page-wrapper">
         
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                Add New Role
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">

                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('roles.store')}}" enctype="multipart/form-data"
                                    onsubmit="return confirm('Do you want to save this?');">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label req">Role name</label>
                                                <div class="input-group input-group-flat">
                                                    <input type="text" name="name" class="form-control" required
                                                        autocomplete="off">
                                                </div>
                                               
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <div class="input-group input-group-flat">
                                                    <input type="text" name="description" class="form-control"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body border-bottom">
                                                    <h3 class="card-title"> Set permissions</h3>
                                                </div>


                                                <div class="table-responsive">
                                                    <table
                                                        class="table card-table table-vcenter text-nowrap datatable resultTable table-striped table-hover table-bordered"
                                                        id="resultTable">
                                                        <thead>
                                                            <tr>
                                                                <th class="w-1">No</th>
                                                                <th>Menu Name</th>
                                                                <th>OPEN ACCES</th>
                                                                <th>View ACCES</th>
                                                                <th>CREATE ACCES</th>
                                                                    <th>EDIT ACCES</th>
                                                                    <th>DELETE ACCES</th>
                                                                {{-- <th>View acces</th>
                                                                <th>Create acces</th>
                                                                <th>Edit acces</th>
                                                                <th>Delete acces</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $count = 1; ?>
                                                            @foreach ($menus as $menu)
                                                                <tr>
                                                                    <td><span class="text-muted">{{ $count }}</span></td>
                                                                    <td>{{ $menu->name }}</td>
                                                                    <td>
                                                                        <label class="form-check form-check-single form-switch">
                                                                            <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-open" name="permissions[]">
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="form-check form-check-single form-switch">
                                                                            <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-view" name="permissions[]">
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="form-check form-check-single form-switch">
                                                                            <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-create" name="permissions[]">
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="form-check form-check-single form-switch">
                                                                            <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-edit" name="permissions[]">
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="form-check form-check-single form-switch">
                                                                            <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-delete" name="permissions[]">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php $count++; ?>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3 mt-5">
                                                <div class="input-group input-group-flat">
                                                    <input class="btn btn-success btn-lg col-12" name="submit"
                                                        type="submit" value="SAVE">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>


                            </div>
                        </div>

                    </div>



                </div>
            </div>

        </div>
    </div>

    @include('footer_tag')

    <script>
        $("#clickItem").change(function() {
            var element = $(this).find('option:selected');
            var product_id = element.attr("value");
            var size_name = element.attr("cick_code");
            var item_name = element.text();


            $("#item_name").val(item_name);
            $("#item_nameSize").text(size_name);
        })

        $(".open_check").click(function() {
            var now = $(this).parent("td label").find(".open_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".open_access").val("active");
            } else {
                $(this).parent("td label").find(".open_access").val("block");
            }
        })


        $(".view_check").click(function() {
            var now = $(this).parent("td label").find(".view_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".view_access").val("active");
            } else {
                $(this).parent("td label").find(".view_access").val("block");
            }
        })

        $(".create_check").click(function() {
            var now = $(this).parent("td label").find(".create_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".create_access").val("active");
            } else {
                $(this).parent("td label").find(".create_access").val("block");
            }
        })

        $(".edit_check").click(function() {
            var now = $(this).parent("td label").find(".edit_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".edit_access").val("active");
            } else {
                $(this).parent("td label").find(".edit_access").val("block");
            }
        })

        $(".delete_check").click(function() {
            var now = $(this).parent("td label").find(".delete_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".delete_access").val("active");
            } else {
                $(this).parent("td label").find(".delete_access").val("block");
            }
        })
    </script>

</body>

</html>{{-- 

<div class="modal modal-blur fade" id="create-category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered modal-dialog-scrollable" role="document" style="width: 75%; margin:auto !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="create_new_act.php" enctype="multipart/form-data" onsubmit="return confirm('Do you want to save this?');">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label req">Role name</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="role_name" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="description" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h3 class="card-title"> Set permissions</h3>
                                </div>


                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable resultTable" id="resultTable">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No</th>
                                                <th>Menu Name</th>
                                                <th>Open acces</th>
                                                <th>View acces</th>
                                                <th>Create acces</th>
                                                <th>Edit acces</th>
                                                <th>Delete acces</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                                <tr id="">
                                                    <td><span class="text-muted"></span></td>

                                                    <td>
                                                       
                                                        <input name="path[]" value="" hidden style="display: none;">
                                                    </td>

                                                    <td>
                                                        <label class="form-check form-check-single form-switch">
                                                            <input class="open_access" value="block" name="open_access[]" hidden style="display: none;">
                                                            <input class="form-check-input btn btn-lg open_check" type="checkbox">
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="form-check form-check-single form-switch">
                                                            <input class="view_access" value="block" name="view_access[]" hidden style="display:none;">
                                                            <input class="form-check-input btn btn-lg view_check" type="checkbox">
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="form-check form-check-single form-switch">
                                                            <input class="create_access" value="block" name="create_access[]" hidden style="display:none;">
                                                            <input class="form-check-input btn btn-lg create_check" type="checkbox">
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="form-check form-check-single form-switch">
                                                            <input class="edit_access" value="block" name="edit_access[]" hidden style="display:none;">
                                                            <input class="form-check-input btn btn-lg edit_check" type="checkbox">
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="form-check form-check-single form-switch">
                                                            <input class="delete_access" value="block" name="delete_access[]" hidden style="display:none;">
                                                            <input class="form-check-input btn btn-lg delete_check" type="checkbox">
                                                        </label>
                                                    </td>
                                                </tr>
                                         

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="input-group input-group-flat">
                                    <input class="btn btn-success btn-lg col-12" name="submit" type="submit" value="SAVE">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    $(".open_check").click(function() {
        var now = $(this).parent("td label").find(".open_access").val();
        if (now == 'block') {
            $(this).parent("td label").find(".open_access").val("active");
        } else {
            $(this).parent("td label").find(".open_access").val("block");
        }
    })


    $(".view_check").click(function() {
        var now = $(this).parent("td label").find(".view_access").val();
        if (now == 'block') {
            $(this).parent("td label").find(".view_access").val("active");
        } else {
            $(this).parent("td label").find(".view_access").val("block");
        }
    })

    $(".create_check").click(function() {
        var now = $(this).parent("td label").find(".create_access").val();
        if (now == 'block') {
            $(this).parent("td label").find(".create_access").val("active");
        } else {
            $(this).parent("td label").find(".create_access").val("block");
        }
    })

    $(".edit_check").click(function() {
        var now = $(this).parent("td label").find(".edit_access").val();
        if (now == 'block') {
            $(this).parent("td label").find(".edit_access").val("active");
        } else {
            $(this).parent("td label").find(".edit_access").val("block");
        }
    })

    $(".delete_check").click(function() {
        var now = $(this).parent("td label").find(".delete_access").val();
        if (now == 'block') {
            $(this).parent("td label").find(".delete_access").val("active");
        } else {
            $(this).parent("td label").find(".delete_access").val("block");
        }
    })
</script> --}}
