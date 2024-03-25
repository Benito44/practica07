<!DOCTYPE html>
<html>
<head>
    <title>Captcha Page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1>Captcha Page</h1>
    <!-- Muestra el captcha -->
    <form method="POST" action="{{ route('captcha.store') }}">
        @csrf
        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
    <a href="login">Login</a>
</body>
</html>
