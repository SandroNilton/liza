<div>
  <x-table-responsive>
    <x-slot name="heading">
      {{ $contests->links() }}
    </x-slot>
    <table class="w-full text-left whitespace-nowrap">
      <thead class="text-[12px] leading-3">
        <tr>
          <th scope="col" class="px-5 py-2 font-semibold tracking-widest text-gray-400 uppercase">Titulo</th>
          <th scope="col" class="px-5 py-2 font-semibold tracking-widest text-gray-400 uppercase">Participantes</th>
          <th scope="col" class="px-5 py-2 font-semibold tracking-widest text-gray-400 uppercase">Mi estado</th>
          <th scope="col" class="px-5 py-2 font-semibold tracking-widest text-gray-400 uppercase">Estado</th>
          <th scope="col" class="px-3 py-2"></th>
        </tr>
      </thead>
      <tbody>
        <tr class="h-2"></tr>
        @forelse ($contests as $contest)
          <tr tabindex="0" class="focus:outline-none h-14 border border-[#F0F1F2] bg-white shadow-sm">
            <td class="px-5">
              <div class="flex items-center pl-5">
                <img class="object-cover w-8 h-8 mr-3 rounded" src="{{ Storage::url($contest->image) }}">
                <p class="text-sm font-medium leading-none text-[#4C4F54] mr-2">{{ $contest->title }}</p>
              </div>
            </td>
            <td class="px-5">
              <div class="flex items-center">
                <ion-icon name="people-outline" class="w-5 h-5 mr-2 text-[#4C4F54]" wire:ignore></ion-icon>
                <p class="text-[13px] font-medium leading-none text-[#4C4F54] ml-2">{{ $contest->participants_count }}</p>
              </div>
            </td>
            <td class="px-5">
              <div class="flex items-center">
                <p class="text-[13px] font-medium leading-none text-[#4C4F54] ml-2">@can('participating', $contest) Aplicando @else Sin aplicar @endcan</p>
              </div>
            </td>
            <td class="px-5">
              <div class="flex items-center">
                <p class="text-[13px] font-medium leading-none text-[#4C4F54] ml-2">{{ $contest->state }}</p>
              </div>
            </td>
            <td class="px-3">
              <button href="{{ route('app.contests.show', $contest) }}" wire:navigate class="text-[13px] leading-none text-gray-600 py-2 px-4 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">Ver</button>
            </td>
          </tr>
          <tr class="h-2"></tr>
        @empty
          <tr class="border-b border-gray-100 hover:bg-gray-50">
            <th colspan="5" class="flex items-center col-span-5 px-4 py-2 font-medium text-center text-gray-500 whitespace-nowrap">
            </th>
          </tr>
        @endforelse
      </tbody>
    </table>
    <x-slot name="footer">   
    </x-slot>
  </x-table-responsive>
</div>