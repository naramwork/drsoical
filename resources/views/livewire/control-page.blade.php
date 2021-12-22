<div>
    <div class=" py-28">

        <div class="m-auto w-2/4 grid grid-cols-2 gap-4 justify-center">

            @can('control')

                <div onclick="Livewire.emit('openModal', 'notification-modal')"
                    class=" hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">إشعارات عامة</h2>
                    </div>
                </div>
            @endcan
            <div
                class=" hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                <x-jet-dropdown-link class="text-lg" href="{{ route('verses') }}">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">المحتوى</h2>
                    </div>
                </x-jet-dropdown-link>

            </div>

            @can('observe')
                <div
                    class=" hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <x-jet-dropdown-link class="text-lg" href="{{ route('messages') }}">
                        <div class="text-center py-10">
                            <h2 class=" text-gray-800 text-3xl font-semibold">البحث عن زواج</h2>
                        </div>
                    </x-jet-dropdown-link>
                </div>
            @endcan


            @can('control')
                <div
                    class=" hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <x-jet-dropdown-link class="text-lg" href="{{ route('customers-control') }}">
                        <div class="text-center py-10">
                            <h2 class=" text-gray-800 text-3xl font-semibold">إدارة المشتركين</h2>
                        </div>
                    </x-jet-dropdown-link>
                </div>
            @endcan
        </div>
    </div>



    <div x-data="{ show: @entangle('showAlertModel')}" x-show="show" x-effect="
if(show){
    setTimeout(() => { show=false }, 2000);
}
">
        <livewire:bottom-alert>


    </div>

</div>
