<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>
  <div class="w-full flex justify-center mx-2">
    <a href="new" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">Nou Article</a>
</div>
<div class="w-full flex justify-center mx-2">
    <a href="edit" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">Editar Article</a>
</div>
<div class="w-full flex justify-center mx-2">
    <a href="delete" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">Eliminar Article</a>
</div>

<br>
<ul>
    @forelse($portafoli as $portfoliItem) 
    <li>Titol de l'article: {{ $portfoliItem->titol }}</li>
    <li>Descripció: {{ $portfoliItem->descripcio }}</ 
    @empty
        <li>Cap projecte a mostrar!!!</li>
    @endforelse
    {{ $portafoli->links() }}
</ul>  
</x-app-layout>