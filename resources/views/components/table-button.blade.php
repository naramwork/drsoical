<button
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-gray-200']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
        {{ $slot }}
    </svg>
</button>
