<div class="flex items-center">

    <x-menu-button>
        <path
            d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z" />
    </x-menu-button>

    {{-- Sort Up Button --}}
    <div wire:click="changeOrder">
        <x-menu-button>
            <path d="M24 22h-24l12-20z" />
        </x-menu-button>
    </div>

    <x-menu-button>
        <path d="M12 21l-12-18h24z" />
    </x-menu-button>

</div>
