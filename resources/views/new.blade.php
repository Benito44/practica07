<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nou Article</title>
    </head>
    <body>
        
        <form method="POST" action="{{ route('new') }}" >
            @csrf
            <p>
                Afegueix el títol i la descripció del nou article:
            </p>
            <input name="name" placeholder="Titol" value="{{old('name')}}"><br> 
            {!!$errors ->first('name','<small>:message</small><br>')!!}
            <textarea name="content" placeholder="Descripcio" value="{{old('content')}}"></textarea><br>
            {!!$errors ->first('content','<small>:message</small><br>')!!}
            <br><button>Enviar</button><br>
        </form>
        <a href="dashboard">Tornar a la pàgina principal</a>
    </body>
</html>
