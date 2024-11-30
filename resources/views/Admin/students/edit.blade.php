
<!doctype html>
<html lang="en">

<head>

    @include('head_tag')
    <title>CBC | Admin | Edit Students Test Results </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <div class="an-pre-loader"></div>

    <div class="page">

@include('Admin.menu')
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                               Edit Student Test Result
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                              
                                <form action="{{ route('students.update', ['student' => $student->id])  }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Use PUT method for updates -->
                                
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Full Name" autocomplete="off" required autofocus="on" value="{{$student->name}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required value="{{$student->email}}">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Mobile</label>
                                                <input type="tel" name="mobile" class="form-control" placeholder="Mobile" autocomplete="off" required value="{{$student->mobile}}">
                                                @error('mobile')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Place</label>
                                                <input type="text" name="from" class="form-control" placeholder="Place" autocomplete="off" required value="{{$student->from}}">
                                                @error('from')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                           
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Realistic Score</label>
                                                <input type="number" id="realistic_score" name="realistic_score" class="form-control" placeholder="Realistic Score" autocomplete="off" required value="{{$student->CareerTestResult->realistic_score}}">
                                                @error('realistic_score')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Social Score</label>
                                                <input type="number" id="social_score" name="social_score" class="form-control" placeholder="Social Score" autocomplete="off" required value="{{$student->CareerTestResult->social_score}}">
                                                @error('social_score')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Investigative Score</label>
                                                <input type="number" id="investigative_score" name="investigative_score" class="form-control" placeholder="Investigative Score" autocomplete="off" required value="{{$student->CareerTestResult->investigative_score}}">
                                                @error('investigative_score')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Artistic Score</label>
                                                <input type="number" id="artistic_score" name="artistic_score" class="form-control" placeholder="Artistic Score" autocomplete="off" required value="{{$student->CareerTestResult->artistic_score}}">
                                                @error('artistic_score')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Enterprising Score</label>
                                                <input type="number" id="enterprising_score" name="enterprising_score" class="form-control" placeholder="Enterprising Score" autocomplete="off" required value="{{$student->CareerTestResult->enterprising_score}}">
                                                @error('enterprising_score')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label req">Conventional Score</label>
                                                <input type="number" id="conventional_score" name="conventional_score" class="form-control" placeholder="Conventional Score" autocomplete="off" required value="{{$student->CareerTestResult->conventional_score}}">
                                                @error('conventional_score')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <!-- The rest of your existing form fields go here -->
                                
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-2">
                                                <input type="submit" class="btn btn-success w-100" value="UPDATE" name="submit">
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




    <style>
        .tox-statusbar {
            visibility: none !important;
            display: none !important;
        }
    </style>

    <script src="https://cdn.tiny.cloud/1/rw0lzeii0190c3zqiauc5qpf5pmm528ekoqp7q95ys99r2tx/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#about',
            skin: 'bootstrap',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | h1 h2 h3 | blocks fontfamily fontsize | bold italic underline blockquote backcolor | align lineheight numlist bullist | emoticons charmap removeformat',
            menubar: false
        });
    </script>


    @include('footer_tag')

    {{-- <script>
        $("#country").change(function(){
            $("#cities").html("");
            $.ajax({
                type: "POST",
                url: "{{ route('employer.register.getCities') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    country:$(this).val()
                },
                dataType: "json",
                success: function (response) {
                    $.each(response, function(index, city) {
                        $("#cities").append('<option value="' + city.id + '">' + city.city_name + '</option>');
                    });
                }
            });
        })
    </script> --}}

   




</body>

</html>
