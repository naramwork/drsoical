<div class="sm:p-4 md:p-8 lg:w-11/12 text-center mx-auto ">

    <x-sub-header>
        الأدعية
    </x-sub-header>

    <div class="pt-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        {{-- <div class="flex items-center justify-between	 ">
            <button onclick='Livewire.emit("openModal", "edit-dua-modal")'
                class="h-10 px-7 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">إضافة</button>

            <div class="text-center align-middle">

            </div>
            <div class="flex items-center">
                <label for="price" class="mx-4 font-medium  sm:text-sm text-lg">البدء من الدعاء رقم</label>
                <div class="relative rounded-md shadow-sm">
                    <input type="number"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full  py-2 sm:text-sm border-gray-300 rounded-md"
                        wire:model='startFrom'>
                </div>
                <button wire:click='changeStartFrom'
                    class="h-10 px-5 m-3 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">تعديل</button>
            </div>

        </div>
        <hr class="m-4"> --}}
        @livewire('duas-tabel')
    </div>
</div>

<div x-data="{ show: @entangle('showAlertModel')}" x-show="show" x-effect="
    if(show){
        setTimeout(() => { show=false }, 2000);
    }
    ">
    <livewire:bottom-alert>


</div>
