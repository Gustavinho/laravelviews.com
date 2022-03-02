<nav aria-label="Sidebar">
  {{-- <h3 class="flex-1 font-semibold text-gray-800 text-sm px-2 py-2">
    {{ env('LARAVEL_VIEWS_VERSION', '') }}
  </h3> --}}
  <x-sidenav.link href="/" activeRoute="">
    Home
  </x-sidenav.link>
  <div class="space-y-4 mt-2">
    @foreach ($menu as $item)
      <div>
        <div class="flex items-center">
          <x-sidenav.title>{{ $item->title }}</x-sidenav.title>
          @isset($item->beta)
            <span class="text-base bg-blue-50 px-2.5 py-0.5 rounded-full font-semibold">
              <a class="text-blue-500 hover:text-blue-400 transition-all duration-300 ease-in-out" href="https://github.com/Gustavinho/laravel-views/releases/tag/{{ $item->beta }}" target="_blank">
                {{ $item->beta }}
              </a>
            </span>
          @endisset
          @isset($item->new)
            <span class="text-xs bg-green-50 text-green-400 px-2.5 py-0.5 rounded-full font-semibold">
              New
            </span>
          @endisset
        </div>
        @foreach ($item->submenu as $submenu)
          <div class="flex items-center">
            <x-sidenav.link :href="$submenu->route">
              {{ $submenu->title }}
            </x-sidenav.link>
            @isset($submenu->new)
              <span class="text-xs bg-green-50 text-green-400 px-2.5 py-0.5 rounded-full font-semibold">
                New
              </span>
            @endisset
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
</nav>