<div>
  <x-table-responsive>
    <x-slot name="heading">
      <div class="flex items-center flex-1 space-x-4">
        <h1>
          <span class="font-medium text-[13px] leading-4 text-[#2477bc] uppercase mb-3">Concursos:</span>
          <span class="font-medium text-[13px] leading-4 uppercase mb-3">{{ $contests->count() }}</span>
        </h1>
      </div>
      <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
        <h1>
        <span class="font-medium text-[13px] leading-4 text-[#2477bc] uppercase mb-3">Mis participaciones:</span>
          <span class="font-medium text-[13px] leading-4 uppercase mb-3"></span>
        </h1>
      </div>
    </x-slot>
    <div>
      
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-[13px] leading-4 text-white uppercase bg-[#2477bc]">
        <tr>
          <th scope="col" class="px-4 py-3">Titulo</th>
          <th scope="col" class="px-4 py-3">Subtitulo</th>
          <th scope="col" class="px-4 py-3">Participacion</th>
          <th scope="col" class="px-4 py-3">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($contests as $contest)
          <tr class="border-b border-gray-100 hover:bg-gray-50">
            <th scope="row" class="flex items-center px-4 py-2 font-medium text-[13px] leading-4 whitespace-nowrap">
              <img src="{{ $contest->image }}" alt="iMac Front Image" class="w-auto h-8 mr-3 rounded-[2.5px]">
              {{ $contest->title }}
            </th>
            <td class="px-4 py-2">
              <span class="font-medium text-[13px] leading-4">{{ $contest->subtitle }}</span>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <div class="flex items-center text-[13px] leading-4">
                @can('participating', $contest)
                  <p>Si participa</p>
                @else
                  <p>No participa</p>
                @endcan
              </div>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <x-secondary-button href="{{ route('contests.show', $contest) }}" wire:navigate>Mas información</x-secondary-button>
            </td>
          </tr>
        @empty
          no hay
        @endforelse
      </tbody>
    </table>
    <x-slot name="footer">
      {{ $contests->links() }}
    </x-slot>
  </x-table-responsive>
</div>