<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

<a href="new">new</a>
<br>
<a href="edit">edit</a>
<br>
<a href="delete">delete</a>
<br>
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
</x-app-layout>