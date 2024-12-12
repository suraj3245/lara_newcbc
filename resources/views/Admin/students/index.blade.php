<!doctype html>
<html lang="en">

<head>

    @include('head_tag')
    <title>CBC | Admin | Students Test Results </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    {{-- <div class="an-pre-loader"></div> --}}

    <div class="page">

        @include('Admin.menu')


        {{-- @if (session()->has('validationErrors'))
        <div class="alert alert-danger">
            <p>Some rows contain validation errors:</p>
            <ul>
                @foreach (session('validationErrors') as $errorRow)
                    <li>Row {{ $loop->index + 1 }}:</li>
        <ul>
            @foreach ($errorRow['errors'] as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <p>Row Data:</p>
        <pre>
        {{ json_encode($errorRow['row'], JSON_PRETTY_PRINT) }}
        </pre>
        @endforeach
        </ul>
    </div>
    @endif
    --}}
    <div class="modal fade" id="validationErrorsModal" tabindex="-1" aria-labelledby="validationErrorsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validationErrorsModalLabel">Confirm
                        Deletion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('validationErrors'))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Row</th>
                                <th>Error</th>
                                <th>Row Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('validationErrors') as $errorRow)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <ul>
                                        @foreach ($errorRow['errors'] as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <pre>{{ json_encode($errorRow['row'], JSON_PRETTY_PRINT) }}</pre>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- Form for actual deletion -->


                </div>
            </div>
        </div>
    </div>


    @if (session()->has('validationErrors'))
    <div class="alert alert-danger w-25">
        Some rows contain validation errors.&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-danger btn-sm" onclick="modelShow()" data-toggle="modal" data-target="#validationErrorsModal">
            view Errors
        </button>

        <button type="button" class="btn-close ml-5" id="closeButton" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
    <button type="button" class="btn btn-danger" onclick="modelShow()" data-toggle="modal" data-target="#validationErrorsModal">
        Show Validation Errors
    </button>
    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}

    <style>
        .custom-alert {
            width: 30%;
        }
    </style>
    @if (session('success'))
    <div id="success-alert" class="alert alert-success custom-alert">
        {{ session('success') }}

    </div>
    <script>
        // Set timeout for success alert
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000); // Adjust the timeout (in milliseconds) as needed
    </script>
    @endif

    @if (session('error'))
    <div id="error-alert" class="alert alert-danger custom-alert">
        {{ session('error') }}

    </div>
    <script>
        // Set timeout for error alert
        setTimeout(function() {
            document.getElementById('error-alert').style.display = 'none';
        }, 3000); // Adjust the timeout (in milliseconds) as needed
    </script>
    @endif


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
                            <a href="{{ route('students.create') }}" class="btn btn-primary d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Add new
                            </a>
                            <a href="{{ route('admin.students.import') }}" class="btn btn-primary d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Import Excel
                            </a>
                            <a href="{{ route('admin.students.export') }}" class="btn btn-success d-sm-inline-block" onclick="return confirmDownload()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Export Excel
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">

                    <form id="filterForm" action="{{ route('admin.students.search') }}" method="get">
                        @csrf <!-- Include CSRF token -->
                        <d<div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Filter</h3>
                                </div>
                                <div class="card-body border-bottom">
                                    <form id="filterForm" action="" method="get">
                                        @csrf <!-- Include CSRF token -->
                                        <div class="row align-items-end">
                                            <div class="col-md-6 col-lg-2">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="search" value="{{ Request::get('search') }}" placeholder="Search">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-2">
                                                <div class="my-3">
                                                    <button type="submit" class="btn btn-success btn-md" style="margin-top: 12px; width:70%;">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                </div>

                </form>

                <div id="data_table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h3 class="card-title">Student Test Result</h3>
                            </div>


                            <div class="table-responsive">
                                <table class="table card-table  table-vcenter text-nowrap datatable resultTable table-striped table-hover table-bordered">
                                    <thead>




                                        <th class="text-center">No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Mobile</th>
                                        <th class="text-center">Class</th>
                                        <th class="text-center">Place</th>

                                        <th class="text-center">Realistic Score</th>
                                        <th class="text-center">Investigative Score</th>
                                        <th class="text-center">Artistic Score</th>
                                        <th class="text-center">Social Score</th>
                                        <th class="text-center">Enterprising Score</th>
                                        <th class="text-center">Conventional Score</th>
                                        <th class="text-center">Magic Link</th>

                                        <th class="text-center" width="100px"></th>
                                        <th class="text-center" width="100px"></th>






                                    </thead>
                                    <tbody>
                                        <?php $count = ($students->currentPage() - 1) * $students->perPage() + 1; ?>

                                        @foreach ($students as $student)
                                        <tr class="text-center">
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email ? $student->email : 'N/A'}}</td>
                                            <td>
                                                {{ $student->mobile ? $student->mobile : 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $student->class ? $student->class : 'N/A'}}
                                            </td>
                                            <td>
                                                {{ $student->from }}
                                            </td>
                                            <td>{{ $student->careerTestResult->realistic_score ?? 'N/A' }}</td>
                                            <td>{{ $student->careerTestResult->investigative_score ?? 'N/A' }}
                                            </td>
                                            <td>{{ $student->careerTestResult->artistic_score ?? 'N/A' }}</td>
                                            <td>{{ $student->careerTestResult->social_score ?? 'N/A' }}</td>
                                            <td>{{ $student->careerTestResult->enterprising_score ?? 'N/A' }}
                                            </td>
                                            <td>{{ $student->careerTestResult->conventional_score ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{$student->magic_link_token ?? 'N/A'}}
                                            </td>



                                            <!-- Aadhar Image Back -->






                                            <td class="text-center w-0">
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning" style="color: #ffff;">
                                                    <i class="ti ti-edit "></i></a>

                                            </td>

                                            <td class="text-center w-0">

                                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __(`Are you sure you want to delete?`) }}')">
                                                        <i class="ti ti-trash"></i>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <div class="pagination-container text-center mt-3 ">

                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-end">
                                {{ $students->links() }}
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







</body>

</html>


<script>
    function modelShow() {

        $('#validationErrorsModal').modal('show');
    }

    function confirmDownload() {
        return confirm("Are you sure you want to download the Excel file?");
    }
</script>
<script>
    document.getElementById('closeButton').addEventListener('click', function() {
        // Send AJAX request to clear session data
        fetch('/clear-session', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => {
                if (response.ok) {
                    // Session cleared successfully
                    console.log('Session cleared');
                } else {
                    // Error handling if session clearance fails
                    console.error('Failed to clear session');
                }
            })
            .catch(error => {
                // Error handling for network errors
                console.error('Network error:', error);
            });
    });
</script>