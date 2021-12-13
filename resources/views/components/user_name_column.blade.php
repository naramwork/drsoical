<div class="text-xs  rounded-xl  border py-2 text-blue-600 border-blue-600 hover:bg-blue-600 hover:text-blue-100 hover:cursor-pointer"
    onclick="Livewire.emit('openModal', 'user-profile-modal' , {{ json_encode(['id' => $row->id]) }})">
    {{ $value }}
</div>
