<!DOCTYPE html>
<html lang="fr">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>Connexion | {{ config('app.name') }}</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="/assets/css/pages/login/classic/login-3.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/media/bg/bg-1.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="{{ url('/') }}">
								<img src="/assets/media/logos/logo-letter-9.png" class="max-h-100px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>Connexion à {{ config("app.name") }}</h3>
								<p class="opacity-60 font-weight-bold">Entrez votre E-mail et votre mot de passe pour vous connecter</p>
							</div>
							<form class="form" id="kt_login_signin_form" method="post" action="{{ route('login') }}">
                @csrf
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="email" placeholder="E-mail" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Mot de passe" name="password" />
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
									<div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-white text-white m-0">
										<input type="checkbox" name="remember" value="1" />
										<span></span>Se souvenir de moi</label>
									</div>
                  @if (Route::has('password.request'))
									  <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Mot de passe oublié ?</a>
                  @endif
								</div>
								<div class="form-group text-center mt-10">
									<button id="kt_login_signin_submit" type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Connexion</button>
								</div>
							</form>
							<div class="mt-10">
								<span class="opacity-70 mr-4">Vous êtes nouveau ?</span>
								<a href="{{ route('register') }}" class="text-white font-weight-bold">Inscrivez-vous</a>
							</div>
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-20">
								<h3>Sign Up</h3>
								<p class="opacity-60">Enter your details to create your account</p>
							</div>
							<form class="form text-center" id="kt_login_signup_form">
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Fullname" name="fullname" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword" />
								</div>
								<div class="form-group text-left px-8">
									<div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-white text-white m-0">
										<input type="checkbox" name="agree" />
										<span></span>I Agree the
										<a href="#" class="text-white font-weight-bold ml-1">terms and conditions</a>.</label>
									</div>
									<div class="form-text text-muted text-center"></div>
								</div>
								<div class="form-group">
									<button id="kt_login_signup_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
									<button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign up form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Mot de passe oublié ?</h3>
								<p class="opacity-60">Entrer votre adresse e-mail pour obtenir un nouveau mot de passe</p>
							</div>
							<form class="form" id="kt_login_forgot_form" method="post" action="{{ route('password.email') }}">
                @csrf
								<div class="form-group mb-10">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="E-mail" name="email" autocomplete="off" value="{{ old('email') }}" />
								</div>
								<div class="form-group">
									<button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Envoyer</button>
									<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Annuler</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#EEE5FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="/assets/js/pages/custom/login/login-general.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
