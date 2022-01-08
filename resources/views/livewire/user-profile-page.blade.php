<!-- eslint-disable -->
<div class="sm:p-4 md:p-8 lg:w-11/12 text-center  mx-auto">


    <x-sub-header>
        {{ $user->name }}
    </x-sub-header>
    <button class="hide_print bg-white text-2xl text-center  mb-4 mx-4 py-2 px-4   rounded-lg "
        onClick="window.print()"><i class="fas fa-print ml-4" style="color:grey"></i> طباعة</button>
    <div class="pt-2  bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class=" flex w-full mx-auto  rounded-lg justify-center items-center">

            <div class="relative shadow hide_print h-24 w-24  mx-5 border-white rounded-full overflow-hidden border-4">
                <img class="hide_print object-cover w-full h-full"
                    src="{{ url('storage/images/' . $user->profile->image_url) ?? 'https://ui-avatars.com/api/?name=' . $user->name }}">
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

            </div>

        </div>

        <div class=" m-auto pt-3 pb-6 w-full border-t ">

            <div class="container  mt-2 mx-auto w-full rounded-md">
                <div class="grid grid-cols-2 gap-4">
                    {{-- Full Name Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الأسم الكامل
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->fullName }}

                        </p>
                    </div>


                    {{-- Date Info Row --}}
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
                            بلد الإقامة
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->country }}
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

                    {{-- City Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            المدينة
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->city }}
                        </p>
                    </div>

                    {{-- City Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الديانة
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->religion }}
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
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الحالة الصحية
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->healthStatus }}
                        </p>
                    </div>

                    {{-- social_status Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            عدد الأطفال
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->children_number }}
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

                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            بنية الجسم
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->physique }}
                        </p>
                    </div>

                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            لون البشرة
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->skinColour }}
                        </p>
                    </div>

                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الصلاة
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->prayer }}
                        </p>
                    </div>

                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            التدين
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->religiosity }}
                        </p>
                    </div>

                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            اللحية
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->beard }}
                        </p>
                    </div>

                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            التدخين
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->smoking }}
                        </p>
                    </div>

                    {{-- weight Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الوضع المادي
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->financialStatus }}
                        </p>
                    </div>


                    {{-- educational_Status Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            المؤهل التعليمي
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->educational }}
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

                    {{-- educational_Status Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            مجال العمل
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->employment }}
                        </p>
                    </div>

                    {{-- educational_Status Info Row --}}
                    <div class="flex  text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الدخل الشهري
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->income }}
                        </p>
                    </div>

                    <div class="flex  text-base border-2 border-gray-300 rounded-xl  bg-gray-50 py-3">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            الجنس
                        </p>
                        <p class="text-right px-3">
                            @if ($user->profile->gender === 'm')
                                ذكر
                            @else
                                انثى
                            @endif

                        </p>
                    </div>

                    {{-- educational_Status Info Row --}}
                    <div
                        class="flex hide_print text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3 col-span-2">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            المواصفات المطلوبة
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->specifications }}
                        </p>
                    </div>

                    {{-- educational_Status Info Row --}}
                    <div
                        class="flex hide_print text-base border-2 border-gray-300 rounded-xl bg-gray-50 py-3 col-span-2">
                        <p class="text-right px-3 border-l-2 border-gray-300">
                            حدثنا عن نفسك
                        </p>
                        <p class="text-right px-3">
                            {{ $user->profile->specifications }}
                        </p>
                    </div>




                </div>
            </div>

        </div>
    </div>

</div>
