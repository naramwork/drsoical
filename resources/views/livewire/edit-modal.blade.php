<div>
    <div class="flex items-center justify-center bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        <h3 class="content-center text-lg leading-6 font-medium text-gray-900">
            Update
        </h3>

    </div>
    <div class="bg-white px-4 sm:p-6">

        <textarea type="text" wire:model="content"
            class="py-1 w-full border-2 border-blue-400 rounded focus:outline-none focus:border-blue-600 resize h-52"></textarea>
    </div>
</div>

<div class="bg-white px-4 pb-5 sm:px-4 sm:flex">

    <button wire:click="$emit('closeModal')"
        class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Close
    </button>

    <button wire:click="$emit('updateContent')"
        class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">Update
    </button>


</div>



</div>
