<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>هم یاد</title>
	<meta name="description" content="HTML Responsive Landing Page Template for Course Online Based on Twitter Bootstrap 3.x.x" />
	<meta name="keywords" content="study, learn, course, tutor, tutorial, teach, college, school, institute, teacher, instructor" />
	<meta name="author" content="crenoveative">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="images/ico/favicon.png">

    <!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="bootstrap-rtl-3.3.4/dist/css/bootstrap-rtl.min.css" media="screen">

	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/plugin.css" rel="stylesheet">

	<!-- CSS Custom -->
	<link href="css/style.css" rel="stylesheet">
	
	<!-- For your own style -->
	<link href="css/your-style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>

<body>

	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
		<header id="header">
	  
			@include('header')

		</header>
		<!-- end Header -->

		<!-- start Main Wrapper -->
		<div class="main-wrapper scrollspy-container">
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
					
					<h1 class="page-title">	وارد شوید !</h1>
					
					<div class="row">
					
						<div class="col-xs-12 col-sm-8">
							<ol class="breadcrumb">
								<li class="active">ورود </li>
							</ol>
						</div>
						
					</div>
					
				</div>

			</div>
			
			<div class="register-page-wrapper">
			
				<div class="container">

					<div class="row gap-50">

						<div class="col-md-8 col-md-offset-2">
							<div class="register-panel">
								<div class="panel-body">
									@if (session('status'))
										<div class="alert alert-success">
											{{ session('status') }}
										</div>
									@endif
									@if (session('warning'))
										<div class="alert alert-warning">
											{{ session('warning') }}
										</div>
									@endif
									<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
										{{ csrf_field() }}

										<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="email" class="col-md-3 col-md-offset-1 text-right  control-label">آدرس ایمیل</label>

											<div class="col-md-7">
												<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

												@if ($errors->has('email'))
													<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
												@endif
											</div>
										</div>

										<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
											<label for="password" class="col-md-3 col-md-offset-1 text-right  control-label">رمز عبور</label>

											<div class="col-md-7">
												<input id="password" type="password" class="form-control" name="password" required>

												@if ($errors->has('password'))
													<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
												@endif
												<div class="row">
													<div class="col-md-6">
														<div class="checkbox-inline">
															<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox">
															<label class="" for="remember_me_checkbox">مرا به خاطر بسپار</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="login-box-link-action">
															<a a href="{{ url('/password/reset') }}">رمز خود را فراموش کردید ؟!</a>
														</div>
													</div>

												</div>

											</div>
										</div>

										<div class="form-group">
											<div class="col-md-7 col-md-offset-4">
												<div class="register-box-box-action">
													عضو نیستید؟<a href="/register"> ثبت نام </a>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-7 col-md-offset-4">
												<button type="submit" class="btn btn-primary btn-block">
													ورود
												</button>
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
		<!-- end Main Wrapper -->
		
		<!-- start Footer Wrapper -->
		<div class="footer-wrapper scrollspy-footer">
		
			@include('footer')

		</div>
		<!-- end Footer Wrapper -->
		
	</div>
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->

<!-- JS -->
<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.4.1.min.js"></script>
<script type="text/javascript" src="bootstrap-rtl-3.3.4/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/spin.min.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/typed.js"></script>
<script type="text/javascript" src="js/placeholderTypewriter.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/select2.full.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/readmore.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/bootstrap-rating.js"></script>
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="js/creditly.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/customs.js"></script>
	<script src="/js/persianumber.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('*').persiaNumber();
		});
	</script>


</body>

</html>