@push('meta')
  <title>{{ $example->title ? $example->title . ' - Laravel Views' : config('app.name') }}</title>
  <x-social-meta
    title="{{ $example->title }}"
    description="{{ $example->description }}"
  />
@endpush

<x-page>
  <div class="prose mt-8 max-w-none">
    <h5 class="text-primary-500 font-semibold">Examples</h5>
    <h1>{{ $example->title }}</h1>
    {{-- <p>{{ $example->description }}</p> --}}

    <div class="not-prose">
      <div class="mt-8">
        <x-tabs :tabs="collect($example->components)->map(fn ($c) => $c->title)">
          @foreach ($example->components as $key => $c)
            <x-slot :name="'tab_'.$key">
              <div class="mt-4">
                @livewire($c->file, ['model' => \App\Models\User::first()])
                <div class="mt-8">
                  <x-code file="{{ app_path() . '/Http/Livewire/'.(collect(explode('.', $c->file)))->map(fn ($path) => str_replace(['-', '.'], ['', '/'], ucwords($path, '-')))->implode('/').'.php' }}" />
                </div>
              </div>
            </x-slot>
          @endforeach
        </x-tabs>
      </div>
    </div>
  </div>
</x-page>