<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Recetas
    </h2>
  </x-slot>

  <div class="bg-white rounded-lg">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Products</h2>

      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach ($recipes as $recipe)
        <a href="{{ asset('recipe/'.$recipe['id']) }}" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="{{ Str::startsWith($recipe['picture'], 'http') ? $recipe['picture'] : asset($recipe['picture']) }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-xl text-gray-700">{{ $recipe['name'] }}</h3>
          <p class="mt-1 text-sm font-medium text-gray-900"><span class="text-zinc-400">Categorías:</span> {{ $recipe->categories()->orderBy('name')->pluck('name')->implode(', ') }}</p>
          <p class="mt-1 text-sm font-medium text-gray-900"><span class="text-zinc-400">Nivel de dificultad:</span> {{ $recipe['level'] }}</p>
          <p class="mt-1 text-sm font-medium text-gray-900"><span class="text-zinc-400">Fecha de publicación:</span> {{ \Carbon\Carbon::parse($recipe['posted_at'])->format('d/m/Y') }} </p>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
