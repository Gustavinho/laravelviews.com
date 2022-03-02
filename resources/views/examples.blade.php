@push('meta')
  <title>{{ $page->title ? $page->title . ' - LaravelViews' : config('app.name') }}</title>
  <x-social-meta
    title="{{ $page->title }}"
    description="{{ $page->subtitle }}"
  />
@endpush

<x-page>
  <div class="py-4 prose max-w-none">
    <h1>
      {{ $page->title }}
    </h1>
    {{ $page->subtitle }}

    <div class="not-prose px-6 pt-6 pb-4 rounded mt-4 bg-white">
      @isset ($page->model)
        @livewire($page->component, ['model' => 1])
      @else
        @livewire($page->component)
      @endisset
    </div>

    <div class="text-sm">
      <h3 class="">Code example</h1>
      <x-code file="{{ app_path() . '/Http/Livewire/'.(collect(explode('.', $page->component)))->map(fn ($path) => str_replace(['-', '.'], ['', '/'], ucwords($path, '-')))->implode('/').'.php' }}" />

      @isset($page->code)
        @foreach ($page->code as $code)
          <h3 class="">{{ $code->title }}</h1>
          <x-code :language="$code->language ?? 'php'" file="{{ base_path() . $code->file }}" />
        @endforeach
      @endisset
    </div>
    </div>
  </div>
</x-page>