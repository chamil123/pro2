<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
        <link rel="stylesheet" href="../css/social_button.css">

        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <!--<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <style>
            body{
                background-image: url("uploads/skyline-buildings-new-york-skyscrapers.jpg"); 

                background-size: cover;
                /*                overflow: hidden;
                                width: 1366px;*/

            }

            .login-logo p{
                color:#666666;
                font-size: 35px;
                padding-top: 30px;
                padding-bottom: 10px;
                font-family: "Raleway Light", Georgia, Serif;
            }.login-card {
                padding: 30px;
                width: 384px;
                background-color: #ffffff;
                /*#F7F7F7;*/
                margin: 0 auto 10px;
                border-radius: 2px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="demo">
                <div class="login">
                    <center>
                        <p style="padding-top: 20px;font-size: 3.3em;color: #ffffff;font-family: 'Quicksand', sans-serif;">login to your account</p>
                        <p style="padding-top: 0px">
                            <img style="width:150px" src="{{ asset('uploads/lock.png')}}">
                        </p>
                    </center>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}
                        <div class="login__form">
                            <div  style="margin-bottom: 20px;margin-top: -20px">

                                <div class="login__row{{ $errors->has('user_nic') ? ' has-error' : '' }}" >
                                    <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                    <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                                    </svg>
                                    <input id="user_nic" type="text" class="login__input name" name="user_nic" value="{{ old('user_nic') }}" required autofocus>
                                     <!--<input type="text" class="login__input name" name="Username" placeholder="Username" autocomplete="off" value=""/>-->
                                    @if ($errors->has('user_nic'))
                                    <span class="help-block">
                                        <strong style="font-size: 12px">{{ $errors->first('user_nic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="login__row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                    <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                                    </svg>
                                    <input id="password" type="password"  class="login__input pass" name="password" required>
                                    <!--<input type="password" class="login__input pass" name="Password" placeholder="Password" value=""  autocomplete="off"/>-->

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="font-size: 12px">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <input type="submit" class=" btn btn-info login__submit" style="margin-top: 30px" > Login
                                <!--                                 <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                                    </label>
                                                                </div>-->
                                                                <!--<p class="login__signup" style="margin-top: -15px">Don't have an account? &nbsp;<a>Sign up</a></p>-->-->
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div> 
                    </form>


                </div>
            </div>
            <!--    <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Login</div>
            
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
            
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>
            
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>-->
        </div>
        <script src="{{ asset('bower_components/bootstrap/jquery/dist/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
        <!--<script src="bootstrap/js/index.js"></script>-->
    </body>
</html>
