<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-10 h-full">

        <div class="m-auto w-2/4 grid grid-cols-2 gap-4 justify-center">
            <div class="  py-4 px-2 bg-white shadow-lg rounded-lg ">
                <div class="text-center py-10">
                    <h2 class=" text-gray-800 text-3xl font-semibold">إشعارات عامة</h2>

                </div>
            </div>
            <div class=" py-4 px-2 bg-white shadow-lg rounded-lg ">
                <div class="text-center py-10">
                    <h2 class=" text-gray-800 text-3xl font-semibold">إشعارات عامة</h2>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
