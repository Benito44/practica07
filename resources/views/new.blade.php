<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <a href="dashboard">dashboard</a>
        <form method="POST" action="{{ route('new') }}" >
            @csrf
            <input name="name" placeholder="Nom..." value="{{old('name')}}"><br> 
            {!!$errors ->first('name','<small>:message</small><br>')!!}
            <textarea name="content" placeholder="Missatge..." value="{{old('content')}}"></textarea><br>
            {!!$errors ->first('content','<small>:message</small><br>')!!}
            <button>Enviar</button><br>
        </form>
    </body>
</html>
