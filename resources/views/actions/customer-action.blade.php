<div>

    @if ($isBlocked == 0)
        <button wire:click='changeBlock({{ $id }},{{ true }})'
            class="bg-transparent  py-2 px-12  font-semibold hover:text-white  border  hover:border-transparent rounded  m-0 border-red-500 hover:bg-red-500 text-red-700 text-base">
            رفض
        </button>
    @else
        <x-menu-button class="m-0 text-base" wire:click='changeBlock({{ $id }},false)'>
            قبول
        </x-menu-button>
    @endif



</div>
