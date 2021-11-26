<button
    {{ $attributes->merge(['class' => 'bg-transparent m-5 py-2 px-12 text-lg hover:bg-blue-500 text-blue-700 font-semibold hover:text-white  border border-blue-500 hover:border-transparent rounded']) }}>
    {{ $slot }}
</button>
