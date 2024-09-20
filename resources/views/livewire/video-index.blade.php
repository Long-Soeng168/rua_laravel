<div>
    <!-- Search -->
    <div class="p-2 bg-gradient-to-r from-primary to-transparent"  id="top-title">
        <div class="max-w-screen-xl mx-auto">
            <form class="w-full " action="{{ url('/videos') }}">
                <div class="flex flex-wrap gap-2">
                    <div class="flex flex-1">
                        <input type="search" id="search-dropdown" wire:model.live.debounce.300ms='search'
                            class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 border-gray-50 border-1 border  dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white rounded-bl-lg md:rounded-bl-none focus:outline-double dark:focus:outline-white focus:outline-primary  border-primary"
                            placeholder="{{ __('messages.search') }}..." name="search"/>
                        <button type="button"
                            class="top-0 end-0 p-2.5 text-md font-medium h-full text-white bg-primary rounded-e-lg border border-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-primary dark:hover:bg-primary dark:focus:ring-primaryHover flex space-x-2 items-center justify-center ml-2 rounded-tr-none md:rounded-tr-lg">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span>{{ __('messages.search') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Search -->

    <div class="max-w-screen-xl grid-cols-12 px-2 mx-auto lg:grid xl:px-0">
        <!-- Items -->
        <div class="col-span-12 lg:pl-4">
            <div class="max-w-screen-xl mx-auto mt-6">
                <div class="flex justify-between px-2 py-1">
                    <p class="text-xl font-bold capitalize text-primary">
                        {{ __('messages.videos') }}
                    </p>
                </div>
                @if ($selected_categories_item || $selected_sub_categories_item)
                    <div class="relative flex flex-wrap gap-2 p-2 pt-4 mt-4 border rounded-md shadow-md">
                        @forelse ($selected_categories_item as $index => $item)
                            <div class="relative flex gap-1 rounded-sm group dark:bg-blue-400/50 bg-blue-400/20" wire:key="{{ $item->id }}-{{ $index }}">
                                <div class="flex items-center gap-2 p-2 text-gray-800 rounded-md dark:text-white">
                                    @if (app()->getLocale() == 'kh' && $item->name_kh)
                                    {{ $item->name_kh }}
                                    @else
                                    {{ $item->name }}
                                    @endif
                                </div>
                                <button
                                    wire:click="handleRemoveCategoryName({{ $item }})"
                                    class="px-1.5 my-1.5 dark:text-white text-gray-700 duration-300 border-l borderdark:bg-blue-400/40 border-l-blue-600/50 dark:border-l-white">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @empty
                        @endforelse

                        @forelse ($selected_sub_categories_item as $index => $item)
                            <div class="relative flex gap-1 rounded-sm group dark:bg-blue-400/30 bg-blue-400/10" wire:key="{{ $item->id }}-{{ $index }}">
                                <div class="flex items-center gap-2 p-2 text-gray-800 rounded-md dark:text-white">
                                    @if (app()->getLocale() == 'kh' && $item->name_kh)
                                    {{ $item->name_kh }}
                                    @else
                                    {{ $item->name }}
                                    @endif
                                </div>
                                <button
                                    wire:click="handleRemoveSubCategoryName({{ $item }})"
                                    class="px-1.5 my-1.5 dark:text-white text-gray-700 duration-300 border-l borderdark:bg-blue-400/40 border-l-blue-600/50 dark:border-l-white">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @empty
                        @endforelse

                        {{-- Filter top title --}}
                        <div
                            class="absolute px-2 duration-300 bg-white border-l border-r dark:bg-gray-800 dark:text-white -top-2.5 left-2">
                           <p class="text-sm font-bold">{{ __('messages.filter') }}</p>
                        </div>

                        {{-- Button Clear all --}}
                        <button
                            wire:click="handleClearAllFilter"
                            class="absolute p-0.5 text-white duration-300 bg-red-400 rounded-full -top-2.5 -right-2.5">
                            <svg class="w-5 h-5 rounded-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                <div
                    class="grid grid-cols-2 gap-2 py-2 lg:py-4 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-6">
                    <!-- Card -->
                    @forelse ($items as $index => $item)

                        <a wire:key="{{ $item->id }}-{{ $index }}" class="block group" href="{{ url('videos/'.$item->id) }}">
                            <div class="w-full overflow-hidden bg-gray-100 border rounded-md dark:bg-neutral-800">
                                @if ($item->image)
                                    <img class="w-full aspect-[{{ env('VIDEO_ASPECT') }}] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                    src="{{ asset('assets/images/videos/thumb/'.$item->image) }}"
                                    alt="Image Description" />
                                @else
                                    <img class="w-full aspect-[{{ env('VIDEO_ASPECT') }}] p-6 group-hover:scale-110 transition-transform duration-500 dark:bg-gray-300 ease-in-out object-contain rounded-md"
                                    src="{{ asset('assets/icons/no-image.png') }}"
                                    alt="Image Description" />
                                @endif
                            </div>

                            <div class="relative pt-2" x-data="{ tooltipVisible: false }">
                                <h3 @mouseenter="tooltipVisible = true" @mouseleave="tooltipVisible = false"
                                    class="relative block font-medium text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white mb-1">
                                    <p class="line-clamp-{{ env('Limit_Line') }}">{{ $item->name }}</p>
                                </h3>

                                <div x-show="tooltipVisible" x-transition
                                    class="absolute z-10 px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm dark:bg-gray-600"
                                    style="display: none;">
                                    {{ $item->name }}
                                    <div class="tooltip-arrow"></div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-700 dark:text-gray-200">{{ __('messages.noData') }}...</p>
                    @endforelse
                </div>
                <!-- End Card Grid -->
            </div>
            <!-- End Items -->
            <!-- Pagination -->
            <div>

                {{ $items->links('vendor.pagination.custom') }}

            </div>
            <!-- End Pagination -->
        </div>
    </div>
@script
<script>

$wire.on('livewire:updatedName', function(name) {
    function uncheckSpecificText(textToMatch) {
        // Get all checkboxes within the multi-dropdown
        let checkboxes = document.querySelectorAll('input[type="checkbox"]');

        // Loop through each checkbox and check its corresponding label
        checkboxes.forEach(function(checkbox) {
            let label = checkbox.nextElementSibling;
            if (label && label.innerText.trim() === textToMatch) {
                checkbox.checked = false; // Uncheck the checkbox if the label text matches 'text1'
            }
        });
    }
    let removedName = name[0];
    uncheckSpecificText(removedName);

    // console.log(removedName);
    // console.log('updated');
});

$wire.on('livewire:updatedClearAllFilter', function(event) {
    function uncheckAll() {
        // Get all checkboxes within the multi-dropdown
        let checkboxes = document.querySelectorAll('input[type="checkbox"]');
        // Loop through each checkbox and check its corresponding label
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
    }
    uncheckAll();

    // console.log(removedName);
    // console.log('updated');
});
$wire.on('livewire:updatedPage', function(event) {
    const topTitleElement = document.getElementById('top-title');
    if (topTitleElement) {
        const offset = 0; // Adjust this value as needed
        const elementPosition = topTitleElement.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
    console.log('updatedPage');
    // console.log('updated');
});
</script>

@endscript
</div>
