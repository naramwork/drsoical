<div class="pt-4">
    <div class="w-10/12 mx-auto ">
        <div class="flex items-center pt-4 justify-center bg-white overflow-hidden p-2 rounded-lg">

            <x-menu-button wire:click="getDataTableType('verses-table')">
                {{ __('آيات') }}
            </x-menu-button>
            <x-menu-button wire:click="getDataTableType('duas-table')">
                {{ __('أدعية') }}
            </x-menu-button>
            <x-menu-button wire:click="">
                {{ __('حديث') }}
            </x-menu-button>
        </div>
    </div>
</div>

<div class="py-4">
    <div class="w-10/12 mx-auto ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        </div>
    </div>
</div>
