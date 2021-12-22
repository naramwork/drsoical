<div>
    <div class="flex items-center justify-center bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        <h3 class="content-center text-lg leading-6 font-medium text-gray-900">
            إرسال اشعار لكافة المستخدمين
        </h3>

    </div>

    <div class="bg-white px-4 sm:p-6">

        {{-- Title --}}
        <div class="mb-4">
            <label class=" block text-right mb-1" for="title">
                العنوان</label>
            <input wire:model="title"
                class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                type="text" id="title" />


        </div>
        <div>
            <label class="block mb-1 text-right" for="body">النص</label>
            <textarea type="text" wire:model="body"
                class="py-1 w-full border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600 resize h-52"></textarea>
            @error('body') <span class="block text-red-600 text-right text-sm">هذا الحقل مطلوب *</span> @enderror

        </div>

    </div>

</div>
<div class="flex items-center bg-white px-4 pb-5 ">


    <button wire:click="$emit('sendNotification')"
        class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
        إرسال
    </button>



    <div class="flex-1">

        <button wire:click="$emit('closeModal')"
            class="
        
         h-10 px-5 text-red-700 transition-colors duration-150 border border-red-500 rounded-lg focus:shadow-outline hover:bg-red-500 hover:text-indigo-100">إغلاق</button>
    </div>


</div>
