@props(['trigger'])

<div x-data="{open: false}" class="relative flex py-1 flex-col lg:w-48 w-full lg:inline-flex items-center bg-gray-100 rounded-xl text-left">
    <div @click.away="open = false" @click="open = !open">
        {{ $trigger }}
    </div>
    <div class="flex flex-col w-full" x-show="open">
        {{ $slot }}
    </div>
</div>