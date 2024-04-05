<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edició de Projectes</title>
</head>
<body>


    <form method="POST" action="{{ route('update')}}">
        @csrf
        @method('PUT')
        <label for="proyecto">Afegueix el títol i la descripció del nou article:</label>
        <select name="proyecto_id" id="proyecto_id">
            @foreach($proyectos as $id)
                <option name="projecte" value="{{ $id }}">{{ $id }}</option>
            @endforeach
        </select>
        <h1>Editar projecte:</h1>
        <br>
        <label for="titulo">Títol:</label>
        <input type="text" name="titulo" id="titulo" >
        <br>
        <label for="descripcion">Descripció:</label>
        <input type="text" name="descripcion" id="descripcion" >
        <br>
        <button type="submit">Editar</button>    
    </form>
    <a href="{{ route('dashboard') }}">Tornar a la pàgina principal</a>
    <ul>
        @forelse($portafoli as $portfoliItem) 
        <li>ID: {{ $portfoliItem->id }}</li>     
        <li>Títol: {{ $portfoliItem->titol }}</li>    
        <li>Descripció: {{ $portfoliItem->descripcio }}</li>    
        @empty
            <li>Cap projecte a mostrar!!!</li>
        @endforelse
        {{ $portafoli->links() }}
    </ul>  
    
</body>
</html>
