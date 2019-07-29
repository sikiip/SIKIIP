<!DOCTYPE html>
<html>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/css/login.css">
    <body>
		<div id="bg-image" class="login">
			<div class="text-login">
				<img src="/image/logo.png"><br><br>
			</div>
			<!--Notifikasi Error-->
				
				<form @submit.prevent="login" method="POST" action="/postlogin">
		          {{csrf_field()}}
		          <div class="errorlogin">
		          	<span>{{ session('error') }}</span>
		          </div>
		          <div>
		            <input  class="username" type="text" name="username" placeholder="Username">
		          </div>
		          <div>
		            <input class="password" type="Password" name="password" placeholder="Password">
		          </div>
		          <div>
		            <button class="button" type="submit" name="login" value="Login">Login</button>
		          </div>
		          <div class="lupaPass">
		            <a id="lupaPass"href="#" class="auth-link text-white">Forgot password?</a>
		          </div>
		         </form>
		</div>
	</body>
</html>