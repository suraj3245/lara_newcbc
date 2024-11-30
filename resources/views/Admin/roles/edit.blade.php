<!doctype html>
<html lang="en">

<head>
    @include('head_tag')
    <title>{{$APP_TITLE}} | Admin | Edit Roles</title>
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
                                Edit Role
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
                                <form method="POST" action="{{route('roles.update',$role->id)}}" 
                                    onsubmit="return confirm('Do you want to save this?');">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label req">Role name</label>
                                                <div class="input-group input-group-flat">
                                                    <input type="text" name="name" class="form-control" required value="{{ old('name',$role->name) }}"
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
                                                        class="table card-table table-vcenter text-nowrap datatable resultTable table-striped table-hover table-border"
                                                        id="resultTable">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th class="w-1">No</th>
                                                                <th>Menu Name</th>
                                                                <th>Acces</th>
                                                                {{-- <th>View acces</th>
                                                                <th>Create acces</th>
                                                                <th>Edit acces</th>
                                                                <th>Delete acces</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $count=1;?>
                                                            @foreach ($permissions as $item)
                                                                <tr id="">
                                                                    <td><span class="text-muted">{{$count}}</span></td>

                                                                    <td>

                                                                        {{-- <input name="" value="" hidden style="display: none;"> --}}{{ $item->name }}
                                                                    </td>

                                                                    <td>
                                                                        <label
                                                                            class="form-check form-check-single form-switch">
                                                                            {{-- <input class="open_access" "
                                                                                name="permissions[]" hidden
                                                                                style="display: none;"> --}}
                                                                            <input
                                                                                class="form-check-input btn btn-lg open_check"
                                                                                type="checkbox" value="{{$item->id}}"  @if(count($role->permissions->where('id',$item->id)))
                                                                                checked   @endif name="permissions[]">
                                                                        </label>
                                                                    </td>

                                                                  
                                                                </tr>
                                                                <?php
                                                                $count++?>
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

</html>
