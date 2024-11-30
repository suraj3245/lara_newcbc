<!doctype html>
<html lang="en">

<head>
    @include('head_tag')
    <title>{{$APP_TITLE}} | Admin Dashboard  </title>

</head>

<body>

    <div class="an-pre-loader"></div>
    @include('Admin.menu')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.do.change.password') }}">
                            @csrf
                        
                            <input type="hidden" name="user_id" value="{{ encrypt($user->id) }}">
                        
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                        
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <span class="input-group-text">
                                            <a href="#" id="passTnglBtn" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                    <span id="password-validation-message" class="text-danger"></span>
                                
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row mt-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
                                    <span id="confirm-password-validation-message" class="text-danger"></span>
                                </div>
                            </div>
                        
                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer_tag')

    <script>
    $(document).ready(function () {
        $('#password').on('input', function () {
            var password = $(this).val();
            var validationMessage = validatePassword(password);
            $('#password-validation-message').text(validationMessage);
        });
        
        $('#password-confirm').on('input', function () {
            var confirmPassword = $(this).val();
            var password = $('#password').val();
            
            if (confirmPassword !== password) {
                $('#confirm-password-validation-message').text('Passwords do not match.');
            } else {
                $('#confirm-password-validation-message').text('');
            }
        });
    });
    $("#passTnglBtn").click(function(e){
        e.preventDefault();
        var NowTp=$("#password").attr("type");
        if(NowTp=="password"){
          $("#password").prop("type", "text");
        }else{
          $("#password").prop("type", "password");
        }
      })
    function validatePassword(password) {
        if (password.length < 8) {
          return 'Password must be at least 8 characters long.';
        }
        if (!/[A-Z]/.test(password)) {
          return 'Password must contain at least one uppercase letter.';
        }

        if (!/\d/.test(password)) {
          return 'Password must contain at least one number.';
        }

        if (!/[!@#$%^&*.]/.test(password)) {
          return 'Password must contain at least one symbol.';
        }

        return '';
      }
</script>




</body>

</html>
