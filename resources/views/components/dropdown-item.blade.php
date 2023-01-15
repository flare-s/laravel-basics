@props(['active' => false])
@php
    $defClasses ='px-3 py-1 hover:bg-blue-500 hover:text-white';
    $activeClasses = 'bg-blue-500 text-white';
@endphp

<a  {{ $attributes->class([$defClasses, $activeClasses => $active]) }}>{{ $slot }}</a>
