<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe['name'] }}
        </h2>
    </x-slot>
    <div class="bg-white rounded-lg p-8">
        <span class="text-blue-600/100">Autor: </span> {{ $recipe['author'] }} <br>
        <span class="text-blue-600/100">Fecha de publicación: </span> {{ \Carbon\Carbon::parse($recipe['posted_at'])->format('d/m/Y') }} <br>
        <img class="rounded-lg h-auto max-w-md" src="{{ Str::startsWith($recipe['picture'], 'http') ? $recipe['picture'] : asset($recipe['picture']) }}" alt="">
        <span class="text-zinc-400">Categorías: </span> {{ $recipe->categories()->orderBy('name')->pluck('name')->implode(', ') }} <br>
        <span class="text-zinc-400">Nivel: </span> {{ $recipe['level'] }} <br>
        <span class="text-zinc-400">Minutos: </span> {{ $recipe['preparation_minutes'] }} <br>
        <span class="text-zinc-400">Ingredientes: </span> {{ $recipe['ingredients'] }} <br>
        <div class="pt-6">
            {!! $recipe['instructions'] !!} <br>
        </div>
    </div>
</x-app-layout>