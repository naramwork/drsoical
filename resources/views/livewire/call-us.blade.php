<div>
    <div class="flex items-center justify-center bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        <h3 class="content-center text-lg leading-6 font-medium text-gray-900">
            اتصل بنا
        </h3>

    </div>

    <div class="bg-white px-4 sm:p-6">

        {{-- Title --}}
        <div class="mb-4 flex items-center">
            <label class="  w-20 text-center ml-4" for="address">
                العنوان</label>
            <input wire:model="address"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="address" />
            <button wire:click="$emit('addToDataBase' , 'address')"
                class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                حفظ
            </button>
        </div>
        {{-- Title --}}
        <div class="mb-4 flex items-center">
            <label class=" w-20  text-center ml-4" for="email">
                Email</label>
            <input wire:model="email"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="email" />
            <button wire:click="$emit('addToDataBase' , 'email')"
                class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                حفظ
            </button>
        </div>

        {{-- Title --}}
        <div class="mb-4 flex items-center">
            <label class=" w-20  text-center ml-4" for="phone">
                الهاتف</label>
            <input style="direction: ltr" wire:model="phone"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="phone" />
            <button wire:click="$emit('addToDataBase' ,'phone')"
                class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                حفظ
            </button>
        </div>

        {{-- Title --}}
        <div class="mb-4 flex items-center">
            <label class=" w-20  text-center ml-4" for="facebook">
                Facebook</label>
            <input wire:model="facebook"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="facebook" />
            <button wire:click="$emit('addToDataBase' ,'facebook')"
                class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                حفظ
            </button>
        </div>

        {{-- Title --}}
        <div class="mb-4 flex items-center">
            <label class="  w-20 text-center ml-4" for="twitter">
                Twitter</label>
            <input wire:model="twitter"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="twitter" />
            <button wire:click="$emit('addToDataBase' ,'twitter')"
                class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                حفظ
            </button>
        </div>

        {{-- Title --}}
        <div class="mb-4 flex items-center">
            <label class="  w-20 text-center ml-4" for="instagram">
                Instagram</label>
            <input wire:model="instagram"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="instagram" />
            <button wire:click="$emit('addToDataBase' ,'instagram')"
                class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                حفظ
            </button>
        </div>

        {{-- Title --}}
        <div class="mb-4 flex items-center">
            <label class=" w-20  text-center ml-4" for="youtube">
                Youtube</label>
            <input wire:model="youtube"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="youtube" />
            <button wire:click="$emit('addToDataBase' ,'youtube')"
                class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                حفظ
            </button>
        </div>





    </div>

</div>
<div class="flex items-center bg-white px-4 pb-5 ">






    <div class="flex-1">

        <button wire:click="$emit('closeModal')"
            class="
        
         h-10 px-5 text-red-700 transition-colors duration-150 border border-red-500 rounded-lg focus:shadow-outline hover:bg-red-500 hover:text-indigo-100">إغلاق</button>
    </div>


</div>
