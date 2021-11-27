    <div class="py-4 w-10/12 mx-auto ">
        <div class="bg-white mb-4 p-2 overflow-hidden shadow-xl sm:rounded-lg">
            <p class="text-2xl	 text-center">
                الآيات
            </p>
        </div>


        <div class="pt-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex items-center justify-between	 ">
                <button onclick='Livewire.emit("openModal", "edit-modal")'
                    class="h-10 px-7 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">إضافة</button>

                <div class="text-center align-middle">

                </div>
                <div class="flex items-center">
                    <label for="price" class="mx-4 text-sm font-medium text-gray-700">البدء من الآية رقم</label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="number"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full  py-2 sm:text-sm border-gray-300 rounded-md"
                            wire:model='startFrom'>
                    </div>
                    <button wire:click='change'
                        class="h-10 px-5 m-3 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">تعديل</button>
                </div>

            </div>
            <hr class="m-4">
            @livewire('verses-table')
        </div>
    </div>

    <div x-data="{ show: @entangle('showAlertModel')}" x-show="show" x-effect="
        if(show){
            setTimeout(() => { show=false }, 2000);
        }
        ">
        <livewire:bottom-alert>


    </div>
