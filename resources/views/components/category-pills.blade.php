@props(['brands'])

<div class="flex flex-wrap gap-2 pb-1" id="cat-pills">
    <button class="pill active px-4 py-2 rounded-full border border-transparent bg-[#27272a] text-white text-sm font-medium transition-all duration-200 cursor-pointer"
        data-cat="all">All</button>
    @foreach ($brands as $brand)
        <button class="pill px-4 py-2 rounded-full border border-[#e4e4e7] bg-white text-[#71717a] text-sm font-medium transition-all duration-200 cursor-pointer hover:border-[#3f3f46] hover:text-[#3f3f46]"
            data-cat="{{ $brand->id }}">{{ $brand->name }}</button>
    @endforeach
</div>
