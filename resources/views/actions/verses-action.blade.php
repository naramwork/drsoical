<div class="flex items-center">

    <button onclick='Livewire.emit("openModal", "edit-modal", {{ json_encode(['verse' => $id]) }})'>Edit User</button>

    <x-table-button>
        <path
            d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z" />
    </x-table-button>



    {{-- Sort Up Button --}}

    <x-table-button wire:click="changeOrder({{ $order }},' up')">
        <path d="M24 22h-24l12-20z" />
    </x-table-button>

    {{-- Sort Down Button --}}
    <x-table-button wire:click="changeOrder({{ $order }},'down')">
        <path d="M12 21l-12-18h24z" />
    </x-table-button>

</div>
