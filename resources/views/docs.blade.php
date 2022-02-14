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
    prose prose-code:text-primary-700 prose-code:bg-gray-200 prose-code:font-normal prose-code:px-1 prose-code:py-1 prose-code:rounded prose-a:text-primary-700 prose-a:font-normal
  ">
    {{-- <span class="text-primary-500 text-base font-medium">Getting started</span> --}}
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