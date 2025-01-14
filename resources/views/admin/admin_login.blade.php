<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login {
            margin-top: 120px;
            max-width: 600px;
            margin: 120px auto;
            background-color: #EAEAEA;
            border: 1px solid #9C9C9C;
            padding: 20px;
        }

        #login h3 {
            text-align: center;
            color: #fff;
            padding-top: 5px;
        }

        #login-box {
            background-color: #fff;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #000;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            height: 40px;
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .btn {
            width: 100%;
            height: 40px;
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div id="login">
        <h3>Admin Login Form</h3>
        <div class="container">
            <div id="login-box">
                @php
                $message = Session::get('message');
                if($message)
                {
                    echo "$message";
                    Session::put('message',null);
                }
                @endphp
                <form class="form" action="{{url('/admin-dashboard')}}" method="post">
                    @csrf
                    <h3 class="text-center text-info">Login</h3>
                    <div class="form-group">
                        <label for="username" class="text-info">Email:</label><br>
                        <input type="text" name="email" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="remember-me" class="text-info"><input id="remember-me" name="remember-me" type="checkbox"> Remember me</label><br>
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
