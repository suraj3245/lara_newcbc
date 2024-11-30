<!doctype html>
<html lang="en">

<head>

    @include('head_tag')
    <title>CBC | Admin | Jobseekers </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    {{-- <div class="an-pre-loader"></div> --}}

    <div class="page">

        @include('Admin.menu')

        <div class="page-wrapper">
            
        
        @if(session('error'))
            <div class="alert alert-danger ">
                {{ session('error') }}
                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
           


            <div class="page-body">
                <div class="container-xl">
                    
                    <form action="{{ url('/admin/students/import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                      
                        <div class="form-group mb-3 col-md-6 ">
                            <label for="file">Choose Excel File:</label>
                            <input type="file" name="file" id="file" class="form-control mt-2" accept=".xlsx, .csv">
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-success w-25">Import data</button>
                           </div>
                      
                        </div>
                      
                    </div>
                    </form>

                </div>
            </div>
    </div>



    @include('footer_tag')







</body>

</html>


<script>
    function modelShow() {
        console.log("called");
        $('#validationErrorsModal').modal('show');
    }
</script>
