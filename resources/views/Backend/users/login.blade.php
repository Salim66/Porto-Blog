<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/poco/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Jul 2021 14:48:25 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('backend/assets/')}}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend/assets/')}}/images/favicon.png" type="image/x-icon">
    <title>Poco - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/themify.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/animate.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/style.css">
    <link id="color" rel="stylesheet" href="{{ asset('backend/assets/')}}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/')}}/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="typewriter">
        <h1>New Era Admin Loading..</h1>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <!-- login page start-->
        <div class="authentication-main">
          <div class="row">
            <div class="col-md-12">
              <div class="auth-innerright">
                <div class="authentication-box">
                  <div class="card-body p-0">

                     <!--Start Login-->
                    <div class="cont text-center">
                      <div>


                        <form class="theme-form" action="{{ route('user.login') }}" method="POST">
                            @csrf
                          <h4>LOGIN</h4>
                          <h6>Enter your Username and Password</h6>
                          <div class="form-group">
                            <label class="col-form-label pt-0">Your Email</label>
                            <input class="form-control" type="text" name="email" required="">
                            <span class="text-danger text-left d-block">{{ (@$errors->has('email'))? @$errors->first('email') : ''}}</span>
                          </div>
                          <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" type="password" name="password" required="">
                            <span class="text-danger text-left d-block">{{ (@$errors->has('password'))? @$errors->first('password') : ''}}</span>
                          </div>
                          <div class="checkbox p-0">
                            <input id="checkbox1" type="checkbox">
                            <label for="checkbox1">Remember me</label>
                          </div>
                          <div class="form-group form-row mt-3 mb-0">
                            <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                          </div>
                          <div class="login-divider"></div>
                          <div class="social mt-3">
                            <div class="form-row btn-showcase">
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-fb">Facebook</button>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-twitter">Twitter</button>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-google">Google + </button>
                              </div>
                            </div>
                          </div>
                        </form>


                      </div>

                      <!--Start Register-->
                      <div class="sub-cont">
                        <div class="img">
                          <div class="img__text m--up">
                            <h2>New here?</h2>
                            <p>Sign up and discover great amount of new opportunities!</p>
                          </div>
                          <div class="img__text m--in">
                            <h2>One of us?</h2>
                            <p>If you already has an account, just sign in. We've missed you!</p>
                          </div>
                          <div class="img__btn"><span class="m--up">Sign up</span><span class="m--in">Sign in</span></div>
                        </div>
                        <div>

                          <form class="theme-form needs-validation" action="{{ route('user.register') }}" method="POST"  novalidate="">
                            @csrf
                            <h4 class="text-center">NEW USER</h4>
                            <h6 class="text-center">Enter your Username and Password For Signup</h6>
                            <div class="form-row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input class="form-control" id="validationCustom01" name="name" type="text" placeholder="Full Name" required="">
                                  <span class="text-danger text-left d-block">{{ (@$errors->has('name'))? @$errors->first('name') : ''}}</span>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input class="form-control" name="email" type="email" placeholder="E-mail" required="">
                                  <span class="text-danger text-left d-block">{{ (@$errors->has('email'))? @$errors->first('email') : ''}}</span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <input class="form-control" name="password" type="Password" placeholder="Password" required="">
                              <span class="text-danger text-left d-block">{{ (@$errors->has('password'))? @$errors->first('password') : ''}}</span>
                            </div>
                            <div class="form-group">
                              <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password" required="">
                              <span class="text-danger text-left d-block">{{ (@$errors->has('password_confirmation'))? @$errors->first('password_confirmation') : ''}}</span>
                            </div>
                            <div class="form-row">
                              <div class="col-sm-4">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                              </div>
                              <div class="col-sm-8">
                                <div class="text-left mt-2 m-l-20">Are you already user?  <a class="btn-link text-capitalize" href="login.html">Login</a></div>
                              </div>
                            </div>
                            <div class="form-divider"></div>
                            <div class="social mt-3">
                              <div class="form-row btn-showcase">
                                <div class="col-sm-4">
                                  <button class="btn social-btn btn-fb">Facebook</button>
                                </div>
                                <div class="col-sm-4">
                                  <button class="btn social-btn btn-twitter">Twitter</button>
                                </div>
                                <div class="col-sm-4">
                                  <button class="btn social-btn btn-google">Google +</button>
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
          </div>
        </div>
        <!-- login page end-->
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('backend/assets/')}}/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('backend/assets/')}}/js/bootstrap/popper.min.js"></script>
    <script src="{{ asset('backend/assets/')}}/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="{{ asset('backend/assets/')}}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ asset('backend/assets/')}}/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('backend/assets/')}}/js/sidebar-menu.js"></script>
    <script src="{{ asset('backend/assets/')}}/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('backend/assets/')}}/js/login.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Plugins JS start-->
    <script src="{{ asset('backend/assets/')}}/js/notify/bootstrap-notify.min.js"></script>
    <script src="{{ asset('backend/assets/')}}/js/notify/notify-script.js"></script>
    <script src="{{ asset('backend/assets/')}}/js/chat-menu.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('backend/assets/')}}/js/script.js"></script>
    <script src="{{ asset('backend/assets/')}}/js/theme-customizer/customizer.js"></script>

    <!-- login js-->
    <!-- Plugin used-->
    @if(Session::has('success'))
    <script>
        $.notify({
            message:'{{ Session::get("success") }}'
        },
        {
            type:'primary',
            allow_dismiss:false,
            newest_on_top:false ,
            mouse_over:false,
            showProgressbar:false,
            spacing:10,
            timer:2000,
            placement:{
                from:'top',
                align:'right'
            },
            offset:{
                x:30,
                y:30
            },
            delay:1000 ,
            z_index:10000,
            animate:{
                enter:'animated bounce',
                exit:'animated bounce'
            }
        });
    </script>
    @endif
    @if(Session::has('warning'))
    <script>
        $.notify({
            message:'{{ Session::get("warning") }}'
        },
        {
            type:'warning',
            allow_dismiss:false,
            newest_on_top:false ,
            mouse_over:false,
            showProgressbar:false,
            spacing:10,
            timer:3000,
            placement:{
                from:'top',
                align:'right'
            },
            offset:{
                x:30,
                y:30
            },
            delay:1000 ,
            z_index:10000,
            animate:{
                enter:'animated bounce',
                exit:'animated bounce'
            }
        });
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        $.notify({
            message:'{{ Session::get("error") }}'
        },
        {
            type:'danger',
            allow_dismiss:false,
            newest_on_top:false ,
            mouse_over:false,
            showProgressbar:false,
            spacing:10,
            timer:2000,
            placement:{
                from:'top',
                align:'right'
            },
            offset:{
                x:30,
                y:30
            },
            delay:1000 ,
            z_index:10000,
            animate:{
                enter:'animated bounce',
                exit:'animated bounce'
            }
        });
    </script>
    @endif
  </body>

<!-- Mirrored from admin.pixelstrap.com/poco/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Jul 2021 14:48:25 GMT -->
</html>
