
<!doctype html>
<html lang="en">

<head>
  @include('head_tag')
    <title>{{$APP_TITLE}} | Admin | Create Permissions</title>
</head>

<body>

    <div class="an-pre-loader"></div>

    <div class="page">

       @include('Admin.menu')

        <div class="page-wrapper">

            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                Add New Permission
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

                                <form method="POST" action="{{route('permissions.store')}}" >
                                    @csrf
                                    <div class="row">


                                      
                                    

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Permission Name</label>
                                                <div class="input-group input-group-flat">
                                                    <input type="text" name="name" id="item_name" class="form-control" required autocomplete="off">
                                                </div>
                                                @error('item_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
    </script>

</body>

</html>