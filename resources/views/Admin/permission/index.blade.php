


<!doctype html>
<html lang="en">

<head>
    <title>{{$APP_TITLE}} | Admin | Permissions </title>
    @include('head_tag')
  
</head>

<body>

    {{-- <div class="an-pre-loader"></div> --}}

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
                             
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">

                                @can('Permissions-create')
                                    <a href="{{route('permissions.create')}}" class="btn btn-primary d-sm-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Add new Permission
                                    </a>
                                   @endcan
                              

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">

                       

                        <div id="data_table">
                            <div class="col-12">
    <div class="card">
        <div class="card-body border-bottom">
            <h3 class="card-title">Permission List</h3>
        </div>


        <div class="table-responsive">
            <table class="table card-table  table-vcenter text-nowrap datatable resultTable table-striped table-hover table-bordered" >
                <thead>
                
                        
                 
                    <tr>
                        <th class="w-1">No</th>
                        <th class="text-center">Name</th>
                       
                        <th class="text-center" width="100px"></th>
                        <th class="text-center" width="100px"></th>
                       
                              
                               
                    </tr>
                </thead>
                <tbody>
                    <?php  $count='1' ;?>
                    @foreach ($permission as $item)
                   <tr>
                            <td class="text-center">{{$count}}</td>
                            <td class="text-center">{{$item->name}}</td>
                          
                            <td class="text-center w-0">
                                @can('Permissions-edit')<a href="{{route('permissions.edit',$item->id)}}" class="btn btn-warning" style="color: #000">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                                @endcan
                            </td>
                            <td class="text-center w-0">
                                @can('Permissions-delete')
                                <form action="{{route('permissions.destroy',$item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                               <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"> <i class="fa-solid fa-trash"></i>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        <?php $count++ ?>
                        @endforeach
                   

                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">

        </div>
    </div>
</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


   
    @include('footer_tag')


    <script>
        loadData();

        //FILTER BTN CLICK FUNCTION START
        $("#filterBtn").click(function() {
            loadData();
        });
        //FILTER BTN CLICK FUNCTION END


        //search change FUNCTION START
        $("#search").change(function() {
            loadData();
        });
        //search change FUNCTION END


        //DATA FETCH FUNCTION START
        function loadData(page) {
            $(".an-pre-loader").fadeIn();
           
        }
        //DATA FETCH FUNCTION END


        // Pagination script start
        $(document).on("click", ".pagination li a", function(e) {
            // alert($(this).attr("id"));
            $(".an-pre-loader").fadeIn();
            e.preventDefault();
            var pageId = $(this).attr("id");
            loadData(pageId);
        });
        // Pagination script END

        $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); // 5 secs

});
    </script>

</body>

</html>