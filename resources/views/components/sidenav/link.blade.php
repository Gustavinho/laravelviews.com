@props(['href', 'activeRoute' => null])
<a href="{{ $href }}" class="group flex-1 flex items-center px-2 py-2 text-sm rounded-md {{ ($href === '/' && request()->is('/') || request()->is(substr($activeRoute ?? $href, 1))) ? 'bg-primary-400 text-white font-medium' : 'text-gray-500 hover:text-gray-900' }} no-underline">
  <span class="truncate">
    {{ $slot }}
  </span>
</a>