<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Proyectos</title>
</head>
<body>


    <form method="POST" action="{{ route('update')}}">
        @csrf
        @method('PUT')
        <label for="proyecto">Selecciona un proyecto:</label>
        <select name="proyecto_id" id="proyecto_id">
            @foreach($proyectos as $id)
                <option name="projecte" value="{{ $id }}">{{ $id }}</option>
            @endforeach
        </select>
        <h1>Editar proyecto:</h1>
        <br>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" >
        <br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" >
        <br>
        <button type="submit">Enviar</button>    
    </form>
    <ul>
        @forelse($portafoli as $portfoliItem) 
        <li>{{ $portfoliItem->id }}</li>     
        <li>{{ $portfoliItem->titol }}</li>    
        <li>{{ $portfoliItem->descripcio }}</li>   
        @empty
            <li>Cap projecte a mostrar!!!</li>
        @endforelse
        {{ $portafoli->links() }}
    </ul>  
    <a href="{{ route('dashboard') }}">Tornar</a>
</body>
</html>
