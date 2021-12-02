<div class="sm:p-4 md:p-8 lg:w-11/12 text-center  mx-auto">
    <x-sub-header>
        الإدارة
    </x-sub-header>
    <x-icons.cog wire:loading class="h-9 w-9 animate-spin text-gray-400" />
    <div class="pt-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">

        @livewire('admin-table')
    </div>
</div>

<div x-data="{ show: @entangle('showAlertModel')}" x-show="show" x-effect="
if(show){
    setTimeout(() => { show=false }, 2000);
}
">
    <livewire:bottom-alert>


</div>
