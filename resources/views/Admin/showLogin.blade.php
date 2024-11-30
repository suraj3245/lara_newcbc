<!doctype html>
<html lang="en">

<head>
    @include('head_tag')
    <title>{{$APP_TITLE}} | Admin | Login </title>
</head>

<body class="border-top-wide border-primary d-flex flex-column">



    <div class="page page-center">
        <div class="container-tight" style="margin-top: 15%;">

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form class="card card-md" action="{{ route('admin.doLogin') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <div class="text-center">
                        <img src="{{ asset('images/cbc_logo.png') }}" style="height:70px;">
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="example1">Email</label>
                        <input type="text" class="form-control" id="example1" name="email" placeholder="Enter your email"
                            autofocus="" autocomplete=" off" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="example2">Password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" id="example2" name="password"
                                placeholder="Enter your password" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-footer">
                        <input type="submit" value="LOGIN" name="login" class="btn btn-primary w-100">
                    </div>
                </div>


            </form>

        </div>
    </div>

    @include('footer_tag')


</body>

</html>
