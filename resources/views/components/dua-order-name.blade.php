@php
$name = '';
switch ($value) {
    case '1':
        $name = 'الإثنين';
        break;

    case '2':
        $name = 'الثلاثاء';
        break;
    case '3':
        $name = 'الأربعاء';
        break;
    case '4':
        $name = 'الخميس';
        break;
    case '5':
        $name = 'الجمعة';
        break;
    case '6':
        $name = 'السبت';
        break;
    case '7':
        $name = 'الأحد';
        break;
    default:
        $name = '';
        break;
}
@endphp

<div class="text-lg m-auto  w-2/4  py-2 ">
    {{ $name }}
</div>
