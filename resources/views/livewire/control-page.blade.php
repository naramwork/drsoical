<div>
    <div class="  py-28">

        <div class="m-auto lg:w-2/4 md:w-3/4  grid grid-cols-6 gap-4 justify-center">

            @can('control')

                <div onclick="Livewire.emit('openModal', 'notification-modal')"
                    class="col-span-3 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">إشعارات عامة</h2>
                    </div>
                </div>
            @endcan
            <div
                class="col-span-3 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                <x-jet-dropdown-link class="text-lg" href="{{ route('verses') }}">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">المحتوى</h2>
                    </div>
                </x-jet-dropdown-link>

            </div>

            @can('observe')
                <div
                    class="col-span-2 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <x-jet-dropdown-link class="text-lg" href="{{ route('messages') }}">
                        <div class="text-center py-10">
                            <h2 class=" text-gray-800 text-3xl font-semibold">البحث عن زواج</h2>
                        </div>
                    </x-jet-dropdown-link>
                </div>
            @endcan


            @can('control')
                <div
                    class="col-span-2 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <x-jet-dropdown-link class="text-lg" href="{{ route('customers-control') }}">
                        <div class="text-center py-10">
                            <h2 class=" text-gray-800 text-3xl font-semibold">إدارة المشتركين</h2>
                        </div>
                    </x-jet-dropdown-link>
                </div>
            @endcan

            @can('control')

                <div onclick="Livewire.emit('openModal', 'about-u-s')"
                    class="col-span-2 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">حول التطبيق</h2>
                    </div>
                </div>
            @endcan

            @can('control')

                <div onclick="Livewire.emit('openModal', 'explain-marriage-model')"
                    class="col-span-2 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">توضيح آلية الزواج</h2>
                    </div>
                </div>
            @endcan

            @can('control')

                <div onclick="Livewire.emit('openModal', 'call-us')"
                    class="col-span-2 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">اتصل بنا</h2>
                    </div>
                </div>
            @endcan

            @can('control')

                <div onclick="Livewire.emit('openModal', 'app-ad')"
                    class="col-span-2 hover:bg-gray-50 hover:cursor-pointer hover:shadow-2xl py-4 px-2 bg-white shadow-lg rounded-lg ">
                    <div class="text-center py-10">
                        <h2 class=" text-gray-800 text-3xl font-semibold">الإعلان</h2>
                    </div>
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
