@php
use App\Models\User;
$user = User::where('id', $value)->first();
@endphp

<div class="text-lg m-auto rounded-xl w-2/4  py-2 text-blue-600 hover:bg-blue-600 hover:text-blue-100 hover:cursor-pointer"
    onclick="Livewire.emit('openModal', 'user-profile-modal' , {{ json_encode(['id' => $value]) }})">
    {{ $user->name }}
</div>
