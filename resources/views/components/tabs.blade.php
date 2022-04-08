@props(['active' => 0, 'tabs' => []])

<div x-data="{tab: {{ $active }}}">
  <div class="sm:hidden">
    <select x-model="tab" aria-label="Selected tab" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      @foreach ($tabs as $index => $tab)
        <option value="{{ $index }}">{{ $tab }}</option>
      @endforeach
    </select>
  </div>

  <div class="hidden sm:block">
    <div class="border-b border-gray-200">
      <nav class="-mb-px flex">
        @foreach ($tabs as $index => $item)
          <a href="#!" @click="tab = {{ $index }}" :class="{
            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab !== {{ $index }},
            'border-primary-500 text-primary-500 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab === {{ $index }}
          }" class="{{ !$loop->first ? 'ml-8' : '' }}">
            {{ $item }}
          </a>
        @endforeach
      </nav>
    </div>
  </div>

  <div>
    @foreach ($tabs as $index => $tab)
      <div x-show="tab == {{ $index }}">
        {{ ${'tab_' . $index} }}
      </div>
    @endforeach
  </div>
</div>