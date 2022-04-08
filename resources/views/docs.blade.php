<x-page>
  <x-slot name='toc'>
    <div class="toc mt-8">
      <x-sidenav.title>On this page</x-sidenav.title>
      <x-toc>
        {!! $page !!}
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
      {!! $page !!}
    </x-markdown>
  </article>
</x-page>