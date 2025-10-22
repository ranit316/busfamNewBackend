<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Busfam Admin - Login</title>


    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sb-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/toastr.min.css') }}">

</head>

<body class="intro-bg">
    <div class="auth-container">
        <div class="card">

            <div class="auth-content">
                <div class="auth-header">
                    <img src="img/login_logo.webp" alt="" class="img-fluid">
                </div>
                <h5>Hello! let's get started</h5>
                <p>Login to continue.</p>

                <form method="POST" action="{{ route('login') }}" id="introForm" class="formular"
                    onsubmit="event.preventDefault(); loginForm(this);">
                    @csrf
                    <div class="mb-3">
                        <!-- <label for="username" class="form-label">Username</label> -->
                        <input type="text" class="validate[required] text-input form-control" placeholder="Username"
                            name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="password" class="form-label">Password</label> -->
                        <input type="password"
                            class="form-control validate[required] text-input login-field  login-field-password"
                            placeholder="Password" id="password-1" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" id="remember" type="checkbox">
                        <label for="remember">Remember me</label>
                        <a href="#" class="forgot-btn float-end">Forgot password?</a>
                    </div>
                    <div class="mb-3 text-center"> <button type="submit"
                            class="btn btn-block btn-primary">Login</button> </div>

                    {{-- <div class="mb-3 text-center">
                        Need an Account? <a href="register.php">Sign Up</a>
                    </div> --}}

                </form>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('assets/admin/js/hideShowPassword.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/waitMe.min.js') }}"></script>




    <script>
        $('#password-1').hidePassword(true);
        $('#password-2').showPassword('focus', {
            toggle: {
                className: 'my-toggle'
            }
        });
        $('#show-password').change(function() {
            $('#password-3').hideShowPassword($(this).prop('checked'));
        });
        // jQuery(document).ready(function() {
        //     jQuery("#introForm").validationEngine('attach', {
        //         promptPosition: "bottomLeft",
        //         autoPositionUpdate: true
        //     });
        // });
    </script>
    <script>
        function loginForm(form) {
            let formData = new FormData(form);
            let url = $(form).attr("action");
            $('.error-text').remove();
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#submitBtn").prop("disabled", true);
                    $('body').waitMe({
                        effect: 'bounce',
                        text: 'Logging in...',
                        bg: 'rgba(255,255,255,0.7)',
                        color: '#000'
                    });
                },
                success: function(response) {
                    if (response.success) {
                        $('body').waitMe("hide");
                        toastr.success(response.message);
                        setTimeout(() => {
                            window.location.href = response.url;
                        }, 1500);
                    }

                },
                error: function(xhr) {
                    $("#submitBtn").prop("disabled", false);
                    $('body').waitMe("hide");
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach((key) => {
                            $("#" + key + "_error").text(errors[key][0]);
                        });
                        toastr.error("Please correct the errors and try again.");
                    } else {
                        toastr.error(xhr.responseJSON.errors);
                    }
                }
            });
        }
    </script>
</body>

</html>
