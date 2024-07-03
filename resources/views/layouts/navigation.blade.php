<nav>
  <x-nav-link href="{{ route('home') }}">Home</x-nav-link>
  <x-nav-link href="{{ asset('/api/recipe/1') }}" target="_blank">API_recipe</x-nav-link>
  <x-nav-link href="{{ asset('/api/recipes/1') }}" target="_blank">API_recipes</x-nav-link>
  <x-nav-link href="{{ asset('/api/category/1/1') }}" target="_blank">API_category</x-nav-link>
  @if (Route::has('login'))
    @auth
      <x-nav-link href="{{ route('dashboard') }}">Profile</x-nav-link>
      <x-nav-link href="{{ route('dashboard') }}">Log out</x-nav-link>
    @else
      <x-nav-link href="{{ route('register') }}">Register</x-nav-link>
      <x-nav-link href="{{ route('login') }}">Log in</x-nav-link>
    @endauth
  @endif
</nav>