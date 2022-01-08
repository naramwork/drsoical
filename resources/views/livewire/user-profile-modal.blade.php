<!-- eslint-disable -->
<div class=" flex w-full mx-auto bg-gray-100 rounded-lg items-center">

    <div class="relative shadow  h-24 w-24  mx-5 border-white rounded-full overflow-hidden border-4">
        <img class="object-cover w-full h-full"
            src="{{ url('storage/images/' . $user->profile->image_url) ?? 'https://ui-avatars.com/api/?name=' . $user->name }}">
    </div>

    <div class="p-6 border-gray-600">
        <h1 class="text-lg text-right font-semibold border-b">
            {{ $user->name }}
        </h1>
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
            <p style="direction: ltr" class="text-lg text-right font-semibold">
                @if ($user->profile->gender === 'm')
                    ذكر
                @else
                    انثى
                @endif

            </p>
        </div>
    </div>

</div>
<hr>
<div class="text-center">
    <a href="{{ route('user-profile-page', ['id' => $user->id]) }}">
        <x-menu-button class="py-1">
            التفاصيل
        </x-menu-button>
    </a>

</div>
