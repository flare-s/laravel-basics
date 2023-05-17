@props(['trigger'])

<div x-data="{open: false}" class="relative flex py-1 flex-col lg:w-48 w-full lg:inline-flex items-center bg-gray-100 rounded-xl text-left">
    <div @click.away="open = false" @click="open = !open">
        {{ $trigger }}
    </div>
    <div class="py-2 absolute bg-gray-100 flex flex-col top-full left-0 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52" x-show="open">
        {{ $slot }}
    </div>
</div>