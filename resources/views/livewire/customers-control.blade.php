<div class="sm:p-4 md:p-8 lg:w-11/12 text-center  mx-auto">
    <x-sub-header>
        المستخدمين
    </x-sub-header>

    <div class="pt-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">

        @livewire('customer-table')
    </div>
</div>

<div x-data="{ show: @entangle('showAlertModel')}" x-show="show" x-effect="
if(show){
    setTimeout(() => { show=false }, 2000);
}
">
    <livewire:bottom-alert>


</div>
