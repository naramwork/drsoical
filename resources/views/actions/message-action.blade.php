<div>

    @if ($status == 'في الإنتظار')
        <div class="flex gap-2">
            <button wire:click='changeStatus({{ $id }}, {{ true }} )'
                class="bg-transparent  py-2 w-20  font-semibold hover:text-white  border  hover:border-transparent rounded-lg  m-0 border-blue-500 hover:bg-blue-500 text-blue-700 text-base ">
                قبول
            </button>
            <button wire:click='changeStatus({{ $id }}, {{ 0 }} )'
                class="bg-transparent  py-2 w-20  font-semibold hover:text-white  border  hover:border-transparent rounded-lg  m-0 border-red-500 hover:bg-red-500 text-red-700 text-base">
                رفض
            </button>
        </div>

    @elseif ( $status == 'مرفوض')
        <button wire:click='changeStatus({{ $id }}, {{ true }} )'
            class="bg-transparent  py-2 w-20  font-semibold hover:text-white  border  hover:border-transparent rounded-lg  m-0 border-blue-500 hover:bg-blue-500 text-blue-700 text-base ">
            قبول
        </button>
    @else
        <button wire:click='changeStatus({{ $id }}, {{ 0 }} )'
            class="bg-transparent  py-2 w-20  font-semibold hover:text-white  border  hover:border-transparent rounded-lg  m-0 border-red-500 hover:bg-red-500 text-red-700 text-base">
            رفض
        </button>
    @endif



</div>
