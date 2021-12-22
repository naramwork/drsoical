<!-- eslint-disable -->
<div class="sm:p-4 md:p-8 lg:w-11/12 text-center  mx-auto">


    <x-sub-header>
        {{ $user->name }}
    </x-sub-header>

    <div class="pt-2  bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class=" flex w-full mx-auto  rounded-lg justify-center items-center">

            <div class="relative shadow  h-24 w-24  mx-5 border-white rounded-full overflow-hidden border-4">
                <img class="object-cover w-full h-full"
                    src="{{ $user->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . $user->name }}">
            </div>

            <div class="p-6  border-gray-600">

                <div>
                    <p class="text-lg text-right font-semibold">
                        {{ $user->email }}
                    </p>

                </div>
                <div>
                    <p style="direction: ltr" class="text-lg text-right font-semibold">
                        {{ $user->profile->phone_number }}

                    </p>
                </div>

                <div>
                    <p class="text-lg text-right font-semibold">
                        @if ($user->profile->gender === 'm')
                            ذكر
                        @else
                            انثى
                        @endif
                    </p>

                </div>

            </div>

        </div>

        <div class=" m-auto pt-3 pb-6 w-full border-t ">

            <div class="container  mt-2 mx-auto w-full rounded-md">
                <div class="grid grid-cols-2 gap-4">
                    {{-- Gender Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            تاريخ الميلاد
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->birthdate }}

                        </p>
                    </div>

                    {{-- Nationality Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الجنسية
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->nationality }}
                        </p>
                    </div>


                    {{-- City Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            المدينة
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->city }}
                        </p>
                    </div>
                    {{-- Job Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            العمل
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->job }}
                        </p>
                    </div>
                    {{-- City Info Row --}}

                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3 col-span-2">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            العنوان
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->address }}
                        </p>
                    </div>

                    {{-- height Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            رقم البطاقة المدنية
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->civil_id_no }}
                        </p>
                    </div>

                    {{-- height Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            تاريخ انتهاء البطاقة المدنية
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->civil_id_no_exp }}
                        </p>
                    </div>

                    {{-- height Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الطول
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->height }}
                        </p>
                    </div>
                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            العرض
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->weight }}
                        </p>
                    </div>

                    {{-- educational_Status Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الوضع التعليمي
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->educational_Status }}
                        </p>
                    </div>

                    {{-- social_status Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الوضع الاجتماعي
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->social_status }}
                        </p>
                    </div>

                    {{-- social_status Info Row --}}



                </div>
            </div>

        </div>
    </div>

</div>
