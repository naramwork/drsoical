<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:mr-10 sm:flex sm:items-center">
                    <x-jet-nav-link class="text-base no-underline px-10 pb-1 " href="{{ route('dashboard') }}"
                        :active="request()->routeIs('dashboard')">
                        {{ __('لوحة التحكم') }}
                    </x-jet-nav-link>
                    {{-- content dropdown --}}
                    <x-jet-dropdown>
                        <x-slot name="trigger">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent  leading-4  font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ __('ادارة المحتوى') }}

                                <svg class="mr-2 h-4 w-4" xmrns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class=" block px-4 py-2 text-sm text-gray-400">
                                {{ __('انواع المحتوى') }}
                            </div>


                            <x-jet-dropdown-link class="text-lg" href="{{ route('verses') }}">
                                {{ __('الآيات') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <x-jet-dropdown-link class="text-lg" href="{{ route('duas') }}">
                                {{ __('الأدعية') }}
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link class="text-lg mb-2" href="{{ route('hadith') }}">
                                {{ __('الحديث الشريف') }}
                            </x-jet-dropdown-link>



                        </x-slot>
                    </x-jet-dropdown>


                    {{-- accouts controll --}}
                    @can('control')
                        <x-jet-dropdown>
                            <x-slot name="trigger">
                                <button type="button"
                                    class="inline-flex items-center  py-2 border border-transparent  leading-4  font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ __('إدارة العضوية') }}

                                    <svg class="mr-2 -ml-0.5 h-4 w-4" xmrns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class=" block px-4 py-2 text-sm text-gray-400">
                                    {{ __('إدارة العضوية') }}
                                </div>


                                <x-jet-dropdown-link class="text-lg" href="{{ route('customers-control') }}">
                                    {{ __('المستخدمين') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>


                                <x-jet-dropdown-link class="text-lg mb-2" href="{{ route('admins-control') }}">
                                    {{ __('الإدارة') }}
                                </x-jet-dropdown-link>


                            </x-slot>
                        </x-jet-dropdown>
                    @endcan
                    {{-- accouts controll --}}
                    @can('observe')
                        <x-jet-dropdown>
                            <x-slot name="trigger">
                                <button type="button"
                                    class="inline-flex items-center  py-2 border border-transparent  leading-4  font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ __('الزواج') }}

                                    <svg class="mr-2 -ml-0.5 h-4 w-4" xmrns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class=" block px-4 py-2 text-sm text-gray-400">
                                    {{ __('البحث عن زواج') }}
                                </div>


                                <x-jet-dropdown-link class="text-lg" href="{{ route('messages') }}">
                                    {{ __('الرسائل') }}

                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>


                                <x-jet-dropdown-link class="text-lg mb-2" href="{{ route('marriage-request') }}">
                                    {{ __('طلبات الزواج') }}

                                </x-jet-dropdown-link>


                            </x-slot>
                        </x-jet-dropdown>
                    @endcan

                    <x-jet-nav-link class="text-base no-underline px-10 pb-1 " href="{{ route('user-message') }}"
                        :active="request()->routeIs('user-message')">
                        {{ __('الإبلاغات') }}
                    </x-jet-nav-link>

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:mr-6">


                <!-- Settings Dropdown -->
                <div class="mr-3 relative">
                    <x-jet-dropdown align="right" width="48">

                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent  leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="mr-2 -ml-0.5 h-4 w-4" xmrns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('إدارة الحساب') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('الملف الشخصي') }}
                            </x-jet-dropdown-link>



                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 border-t">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('لوحة التحكم') }}
            </x-jet-responsive-nav-link>
        </div>


        <div class="pt-2 pb-3 space-y-1 border-t">
            <x-jet-responsive-nav-link href="{{ route('verses') }}" :active="request()->routeIs('verses')">
                {{ __('الآيات') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('duas') }}" :active="request()->routeIs('duas')">
                {{ __('الأدعية') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('hadith') }}" :active="request()->routeIs('hadith')">
                {{ __('الحديث الشريف') }}
            </x-jet-responsive-nav-link>
        </div>

        @can('control')
            <div class="pt-2 pb-3 space-y-1 border-t">
                <x-jet-responsive-nav-link href="{{ route('customers-control') }}"
                    :active="request()->routeIs('customers-control')">
                    {{ __('المستخدمين') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('admins-control') }}"
                    :active="request()->routeIs('admins-control')">
                    {{ __('الإدارة') }}
                </x-jet-responsive-nav-link>
            </div>
        @endcan

        @can('observe')
            <div class="pt-2 pb-3 space-y-1 border-t">
                <x-jet-responsive-nav-link href="{{ route('messages') }}" :active="request()->routeIs('messages')">
                    {{ __('الرسائل') }}

                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('marriage-request') }}"
                    :active="request()->routeIs('marriage-request')">
                    {{ __('طلبات الزواج') }}
                </x-jet-responsive-nav-link>
            </div>
        @endcan

        @can('observe')
            <div class="pt-2 pb-3 space-y-1 border-t">
                <x-jet-responsive-nav-link href="{{ route('user-message') }}"
                    :active="request()->routeIs('user-message')">
                    {{ __('الإبلاغات') }}
                </x-jet-responsive-nav-link>
            </div>
        @endcan

        <!-- Responsive Settings Options -->
        <div class="pt-2 pb-1 border-t border-gray-200">






            <div class="mt-3 space-y-1">

                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('الملف الشخصي') }}
                </x-jet-responsive-nav-link>



                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('تسجيل خروج') }}
                    </x-jet-responsive-nav-link>
                </form>

            </div>
        </div>
    </div>
</nav>
