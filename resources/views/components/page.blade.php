<x-layout>
  <div class="max-w-8xl px-4 sm:px-6 mx-auto">
    <div class="lg:grid lg:grid-cols-5 lg:gap-12">
      <div class="hidden lg:block relative">
        <div class="py-8 sticky top-16 overflow-auto h-screen">
          @isset($menu)
            {!! $menu !!}
          @else
            <x-menu />
          @endisset
        </div>
      </div>
      <div class="{{ isset($toc) ? 'lg:col-span-3' : 'lg:col-span-4' }}">
        <main>
          {!! $slot !!}
        </main>
      </div>
      @isset($toc)
        <div class="sticky top-16 lg:overflow-auto lg:h-screen">
          {!! $toc !!}
        </div>
      @endisset
    </div>
  </div>
</x-layout>