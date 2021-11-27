<div>
    <div class="flex items-center justify-center bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        <h3 class="content-center text-lg leading-6 font-medium text-gray-900">
            @if ($contentId != 0)
                تعديل
            @else
                إضافة
            @endif
        </h3>

    </div>

    <div class="bg-white px-4 sm:p-6">
        {{-- Surah - Range - part --}}
        <div class="flex flex-wrap py-4  -mx-2 space-y-4 md:space-y-0">
            {{-- Surah --}}
            <div class="w-full px-2 md:w-1/3">
                <label class="block mb-1" for="surah">Surah</label>
                <input wire:model="surah"
                    class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                    type="text" id="surah" />
                @error('surah') <span class="error">{{ $message }}</span> @enderror
            </div>
            {{-- Range --}}
            <div class="w-full px-2 md:w-1/3">
                <label class="block mb-1" for="range">Range</label>
                <input wire:model='range'
                    class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                    type="text" id="range" />
            </div>
            {{-- Part --}}
            <div class="w-full px-2 md:w-1/3">
                <label class="block mb-1" for="part">Part</label>
                <input wire:model='part'
                    class="w-full h-10 py-1 border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600"
                    type="text" id="part" />
            </div>
        </div>
        <div>
            <label class="block mb-1" for="part">Content</label>
            <textarea type="text" wire:model="content"
                class="py-1 w-full border-2 border-gray-400 rounded focus:outline-none focus:border-blue-600 resize h-52"></textarea>
            @error('content') <span class="error">{{ $message }}</span> @enderror

        </div>

    </div>
</div>

<div class="flex items-center	 bg-white px-4 pb-5 ">

    @if ($contentId != 0)
        <button wire:click="$emit('updateVerse')"
            class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">Update
        </button>
        <div class="flex-1">
            <button wire:click="$emit('deleteVerse')"
                class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Delete
            </button>
        </div>
    @else
        <button wire:click="$emit('addVerse')"
            class=" h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">Add
        </button>
        <div class="flex-1"></div>
    @endif


    <button wire:click="$emit('closeModal')"
        class="
        
         h-10 px-5 text-red-700 transition-colors duration-150 border border-red-500 rounded-lg focus:shadow-outline hover:bg-red-500 hover:text-indigo-100">Close</button>

</div>



</div>
