<div>
    <!-- Search -->
    <div class="p-2 bg-gradient-to-r from-primary to-transparent" id="top-title">
        <div class="max-w-screen-xl mx-auto">
            <form class="w-full " action="{{ url('/news') }}">
                <div class="flex flex-wrap gap-2">
                    <div class="flex flex-1">
                        <input type="search" id="search-dropdown" wire:model.live.debounce.300ms='search'
                            class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 border-gray-50 border-1 border  dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white rounded-bl-lg md:rounded-bl-none focus:outline-double dark:focus:outline-white focus:outline-primary  border-primary"
                            placeholder="{{ __('messages.search') }}..." name="search" />
                        <button type="button"
                            class="top-0 end-0 p-2.5 text-md font-medium h-full text-white bg-primary rounded-e-lg border border-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-primary dark:hover:bg-primary dark:focus:ring-primaryHover flex space-x-2 items-center justify-center ml-2 rounded-tr-none md:rounded-tr-lg">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
        <div class="col-span-12">
            <div class="max-w-screen-xl mx-auto mt-6">
                <div class="flex justify-between px-2 py-1">
                    <p class="text-xl font-bold capitalize text-primary">
                        News
                    </p>
                </div>
                <div
                    class="grid grid-cols-2 gap-2 py-2 lg:py-4 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-6">
                    <!-- Card -->
                    @forelse ($items as $index => $item)

                        <a wire:key="{{ $item->id }}-{{ $index }}" class="block group"
                            href="{{ url('news/' . $item->id) }}">
                            <div class="w-full overflow-hidden bg-gray-100 border rounded-md dark:bg-neutral-800">
                                @if ($item->image)
                                    <img class="w-full aspect-[{{ env('BULLETIN_ASPECT') }}] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                        src="{{ asset('assets/images/news/thumb/' . $item->image) }}"
                                        alt="Image Description" />
                                @else
                                    <div
                                        class="aspect-{{ env('BULLETIN_ASPECT') }} rounded-md shadow overflow-hidden cursor-pointer relative">
                                        <img class="w-full aspect-[{{ env('BULLETIN_ASPECT') }}] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md"
                                            src="{{ asset('assets/book_cover_default.png') }}"
                                            alt="Image Description" />

                                        <h1
                                            class="absolute block w-full p-4 text-lg font-bold text-center text-gray-700 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                            @if (app()->getLocale() == 'kh' && $item->name_kh)
                                                {{ $item->name_kh }}
                                            @else
                                                {{ $item->name }}
                                            @endif
                                        </h1>

                                    </div>
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
        $wire.on('livewire:updatedPage', () => {
        window.location.reload();
        });
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

                console.log(removedName);
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
