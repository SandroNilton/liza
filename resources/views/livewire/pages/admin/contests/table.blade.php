<div>
  <x-table-responsive>
    <x-slot name="heading">
      <div class="flex items-center flex-1 space-x-4">
        <h1>
          <span class="font-medium text-[13px] text-[#2477bc] uppercase mb-3">Concursos:</span>
          <span class="font-medium text-[13px] uppercase mb-3">{{ $contests->count() }}</span>
        </h1>
      </div>
      <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
        <x-primary-button href="{{ route('admin.contests.create') }}" wire:navigate>Nuevo</x-primary-button>
      </div>
    </x-slot>
    <div>
      
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-[13px] leading-4 text-white uppercase bg-[#2477bc]">
        <tr>
          <th scope="col" class="px-4 py-3">Titulo</th>
          <th scope="col" class="px-4 py-3">Participantes</th>
          <th scope="col" class="px-4 py-3">Estado</th>
          <th scope="col" class="px-4 py-3">Creador</th>
          <th scope="col" class="px-4 py-3">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($contests as $contest)
          <tr class="border-b border-gray-100 hover:bg-gray-50">
            <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                <img src="{{ $contest->image }}" alt="iMac Front Image" class="w-auto h-8 mr-3 rounded-[2.5px]">
                {{ $contest->title }}
            </th>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
              <div class="flex items-center">
                <ion-icon name="people-outline" class="w-5 h-5 mr-2 text-gray-400" wire:ignore></ion-icon>
                {{ $contest->participants_count }}
              </div>
            </td>
            <td class="px-4 py-2">{{ $contest->state }}</td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">{{ $contest->user->name }}</td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
              <x-secondary-button href="{{ route('admin.contests.edit', $contest) }}" wire:navigate>Editar</x-secondary-button>
            </td>
          </tr>
        @empty
          <tr class="border-b border-gray-100 hover:bg-gray-50">
            <th colspan="5" class="col-span-5 flex items-center px-4 py-2 text-center font-medium text-gray-500 whitespace-nowrap">
            </th>
          </tr>
        @endforelse
      </tbody>
    </table>
    <x-slot name="footer">
      {{ $contests->links() }}
    </x-slot>
  </x-table-responsive>
</div>