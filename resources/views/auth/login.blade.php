<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login: bootstrap 4</title>


    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>

    <link rel="stylesheet" href="../assets/css/signin.css">


</head>

<body>

<div class="auth">
    <div class="auth__header">
        <div class="auth__logo">
            {{--<img height="90" src="https://d2eip9sf3oo6c2.cloudfront.net/series/square_covers/000/000/083/full/EGH_VueJS_Final.png" alt="">--}}
        </div>
    </div>
    <div class="auth__body">
        <form class="auth__form" autocomplete="off">
            <div class="auth__form_body">
                <h3 class="auth__form_title">Sign in</h3>
                <div>
                    <div class="form-group">
                        <label class="text-uppercase small">Email</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase small">Password</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="auth__form_actions">
                <button class="btn btn-primary btn-lg btn-block">
                    LOGIN
                </button>
                {{--<div class="mt-2">
                    <a href="#" class="small text-uppercase">
                        Forgot password
                    </a>
                </div>--}}
            </div>
        </form>
    </div>
</div>



</body>

</html>
