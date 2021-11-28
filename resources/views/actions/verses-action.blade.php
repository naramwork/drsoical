<div class="flex items-center">

    {{-- Edit Button --}}

    <button onclick='Livewire.emit("openModal", "edit-{{ $type }}-modal", {{ json_encode([$type => $id]) }})'
        class="inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
            <path
                d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z" />
        </svg>
    </button>

    {{-- Sort Buttonn send Request into VersesTable Livewire Component to change the order of the selected item --}}

    {{-- Sort Down Button --}}
    <x-table-button wire:click="changeOrder({{ $order }},'down')">
        <path d="M12 21l-12-18h24z" />
    </x-table-button>

    {{-- Sort Up Button --}}

    <x-table-button wire:click="changeOrder({{ $order }},'up')">
        <path d="M24 22h-24l12-20z" />
    </x-table-button>



</div>
