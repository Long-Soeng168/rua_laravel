@extends('layouts.client')
@section('content')
    <section class="font-poppins" style="">
        <!-- Start Main Content -->
        <div class="grid grid-cols-12 gap-4 p-2 mx-auto max-w-7xl">

            <!-- Start Middle section -->
            <div class="col-span-12 pt-4 rounded-md lg:col-span-9">
                <div class="min-[800px]:grid grid-cols-12 gap-4">
                    <div class="flex flex-col items-center w-full col-span-5 px-2 mb-6 mr-2 lg:col-span-4 lg-px-0">
                        <div class="flex flex-col w-full gap-2">
                            @if ($item->image)
                            <a href="{{ asset('assets/images/articles/' . $item->image) }}" class="glightbox">
                                <img class="w-full bg-white border rounded-md shadow cursor-pointer"
                                    src="{{ asset('assets/images/articles/thumb/' . $item->image) }}" alt="Book Cover" />
                            </a>
                            @else
                                <div class="aspect-{{ env('ARTICLE_ASPECT') }} border rounded-md shadow cursor-pointer relative">
                                    <img class="object-contain w-full h-full" src="{{ asset('assets/book_cover_default.png') }}"
                                        alt="Book Cover" />

                                    <h1
                                        class="absolute block w-full p-4 text-2xl font-medium font-bold leading-9 text-center text-gray-700 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 dark:text-gray-100">
                                        @if (app()->getLocale() == 'kh' && $item->name_kh)
                                            {{ $item->name_kh }}
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </h1>
                                    <p
                                        class="absolute bottom-0 block w-full p-4 text-lg font-medium leading-6 text-right text-gray-700 dark:text-gray-100">
                                        {{ $item->author?->name }}
                                    </p>
                                </div>
                            @endif

                            <!-- Action Button -->
                            <div class="flex w-full gap-2 rounded-md shadow-sm" role="group">
                                    <div class="flex-1">
                                        {{-- Start Read Button --}}
                                        <a @if (!$item->can_read && !auth()->check()) href="{{ route('client.login', ['path' => 'articles-' . $item->id]) }}"
                                        @else
                                            @if ($websiteInfo->pdf_viewer_default == 1)
                                                href="{{ route('pdf.stream', [
                                                    'archive' => 'article',
                                                    'id' => $item->id,
                                                    'file_name' => $item->pdf,
                                                ]) }}"
                                            @else
                                                href="{{ route('pdf.view', [
                                                    'archive' => 'article',
                                                    'id' => $item->id,
                                                    'file_name' => $item->pdf,
                                                ]) }}" @endif
                                            @endif

                                            class="relative inline-flex items-center justify-center w-full h-full gap-2 px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            <div>
                                                <div class="flex flex-wrap gap-1">
                                                    <p class="whitespace-nowrap">{{ __('messages.readPdf') }}</p>
                                                </div>
                                            </div>
                                            @if (!$item->can_read)
                                                <span class="absolute bg-red-500 border rounded-full -top-1.5 -right-1.5">
                                                    <img class="w-6 h-6 " src="{{ asset('assets/icons/lock.png') }}"
                                                        alt="">
                                                </span>
                                            @endif

                                        </a>
                                        {{-- End Read Button --}}

                                        {{-- <button type="button"
                                        class="inline-flex items-center justify-center w-full gap-2 px-4 py-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                                        onclick="openPdfPopup('{{ asset('assets/pdf/articles/' . $item->pdf) }}', 'article', {{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-eye">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <div>
                                            <div class="flex flex-wrap gap-1">
                                                <p class="whitespace-nowrap">{{ __('messages.readPdf') }}</p>
                                                @if ($item->read_count)
                                                <p>( {{ $item->read_count }} )</p>
                                                @endif
                                            </div>
                                        </div>
                                    </button> --}}

                                    </div>

                                    <!-- Popup Container -->
                                    <div class="popup-overlay" id="popupOverlay">
                                        <div class="popup-content-container">
                                            <div class="popup-content">
                                                <span class="close-btn" onclick="closePdfPopup()">
                                                    <img src="{{ asset('assets/icons/cancel.png') }}" alt=""
                                                        class="close-btn-image" />
                                                </span>
                                                <embed id="pdfEmbed" src="" width="100%" height="100%" />
                                            </div>
                                        </div>
                                    </div>

                                    @if ($websiteInfo->show_download_button)
                                        <div class="flex-1">
                                            {{-- Start Download Button --}}
                                            <a @if (!$item->can_download && !auth()->check()) href="{{ route('client.login', ['path' => 'articles-' . $item->id]) }}"
                                        @else
                                        href="{{ route('pdf.download', [
                                            'archive' => 'article',
                                            'id' => $item->id,
                                            'file_name' => $item->pdf,
                                        ]) }}"
                                        onclick="
                                            (function(){
                                                fetch(`/add_download_count/article/{{ $item->id }}`)
                                                .then(response => {
                                                    if (response.ok) {
                                                        console.log('success');
                                                    } else {
                                                        console.error('Error:', response.statusText);
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                });
                                            })();
                                        " @endif
                                                class="relative inline-flex items-center justify-center w-full h-full gap-2 px-2 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-arrow-down-to-line">
                                                    <path d="M12 17V3" />
                                                    <path d="m6 11 6 6 6-6" />
                                                    <path d="M19 21H5" />
                                                </svg>
                                                <div class="flex flex-wrap gap-1">
                                                    <p class="whitespace-nowrap">{{ __('messages.download') }}</p>
                                                </div>
                                                @if (!$item->can_download)
                                                    <span class="absolute bg-red-500 border rounded-full -top-1.5 -right-1.5">
                                                        <img class="w-6 h-6 " src="{{ asset('assets/icons/lock.png') }}"
                                                            alt="">
                                                    </span>
                                                @endif
                                            </a>
                                            {{-- End Download Button --}}

                                        </div>
                                    @endif


                            </div>
                        </div>
                    </div>
                    <div class="col-span-7 p-4 lg:col-span-8 lg:p-2">
                        <h1 class="block mt-1 mb-2 text-2xl font-medium leading-tight text-gray-800 dark:text-gray-100">
                            @if (app()->getLocale() == 'kh' && $item->name_kh)
                                {{ $item->name_kh }}
                            @else
                                {{ $item->name }}
                            @endif

                        </h1>
                        @if ($item->description)
                            <div class="mt-8">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                    {{ __('messages.description') }}
                                </h2>
                                <div class="no-tailwind dark:text-white">
                                    @if (app()->getLocale() == 'kh' && $item->name_kh)
                                        {!! $item->description_kh !!}
                                    @else
                                        {!! $item->description !!}
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <!-- End Middle section -->

            <!-- Start Right Section -->
            <div class="col-span-12 space-y-6 lg:col-span-3 no-tailwind">
                <div id="contactbox" class="p-4 bg-white border rounded-lg shadow-lg no-tailwind">
                    {!! app()->getLocale() == 'kh' ? $sideinfo->description_kh : $sideinfo->description !!}
                </div>
                <div id="contactbox" class="p-4 bg-white border rounded-lg shadow-lg no-tailwind">
                    {!! app()->getLocale() == 'kh' ? $sideinfo->contact_info_kh : $sideinfo->contact_info !!}
                </div>
            </div>
            <!-- End Right Section -->
        </div>
        <!-- End Main Content -->
    </section>
@endsection
