<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
</head>
<body>
    <form method="POST" action="{{ route('delete')}}" onsubmit="return confirm('Segur que vols eliminar aquest projecte?');">
        @csrf
        @method('DELETE')
        <label for="proyecto">Elimina un projecte per el seu ID:</label>
        <select name="proyecto_id" id="proyecto_id">
            @foreach($proyectos as $id)
                <option name="projecte" value="{{ $id }}">{{ $id }}</option>
            @endforeach
        </select>
        <button type="submit">Eliminar</button>    
    </form>
    <a href="{{ route('dashboard') }}">Tornar</a>
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
