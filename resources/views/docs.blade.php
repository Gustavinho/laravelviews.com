@push('meta')
  <title>{{ $title ? 'Laravel Views - ' . $title : config('app.name') }}</title>
  <x-social-meta
    title="{{ $title }}"
    description="Laravel package to create beautiful common views like data tables using the TALL stack."
    image="{{ asset('/img/docs/table.png') }}"
  />
@endpush

<x-page>
  <x-slot name='toc'>
    <div class="toc mt-8">
      <x-sidenav.title>On this page</x-sidenav.title>
      <x-toc>
        {!! $content !!}
      </x-toc>
    </div>
  </x-slot>
  <article class="
    py-8 max-w-none
    prose
    prose-code:bg-gray-200 prose-code:font-semibold prose-code:px-1 prose-code:py-1 prose-code:rounded
    prose-a:decoration-pink-500
    prose-img:shadow-lg prose-img:rounded
    prose-blockquote:border-pink-500 prose-blockquote:font-normal prose-blockquote:bg-gray-100 prose-blockquote:text-gray-700
  ">
    {{-- <span class="text-primary-500 text-base font-medium">Features</span> --}}
    <x-markdown
      anchors
      flavor="github"
      :options="[
        'renderer' => [
        ]
      ]"
    >
      {!! $content !!}
    </x-markdown>
  </article>
</x-page>