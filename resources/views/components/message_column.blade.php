<div class="text-base py-2 hover:text-blue-400 hover:cursor-pointer"
    onclick="Livewire.emit('openModal', 'message-modal' , {{ json_encode(['message' => $value]) }})">
    @if (mb_strlen($value) > 10)
        {{ mb_substr($value, 0, 10) . ' ...' }}
    @else
        {{ $value }}
    @endif
</div>
