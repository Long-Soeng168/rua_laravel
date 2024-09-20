@extends('layouts.client')
@section('content')
    <section class="font-poppins" style="">
        <!-- Start Main Content -->
        <div class="grid grid-cols-12 gap-4 p-2 mx-auto max-w-7xl">

            <!-- Start Middle section -->
            <div class="col-span-12 rounded-md lg:col-span-9">
                <!-- Blog Article -->
                <div class="relative w-full overflow-hidden rounded-md">
                    @if ($item->image)
                        <img class="w-full border rounded-md cursor-pointer"
                            src="{{ asset('assets/images/videos/' . $item->image) }}" alt="Book Cover" />
                    @else
                        <img class="object-contain w-full p-10 border rounded-md cursor-pointer aspect-video"
                            src="{{ asset('assets/icons/no-image.png') }}" alt="Book Cover" />
                    @endif

                    <div class="absolute inset-0 border size-full">
                        <div class="flex flex-col items-center justify-center size-full">
                            <a class="inline-flex items-center px-4 py-3 text-sm font-semibold text-gray-800 bg-white border border-gray-200 rounded-full shadow-sm glightbox3 gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                                href="{{ $item->link ? $item->link : asset('assets/videos/' . $item->file) }}">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="5 3 19 12 5 21 5 3" />
                                </svg>
                                Play Video
                            </a>
                        </div>
                    </div>

                </div>
                <!-- End Blog Article -->
                <div class="col-span-7 p-4 lg:col-span-8 lg:p-2">
                    <h1 class="block mt-1 mb-2 text-xl font-bold leading-tight text-gray-800 dark:text-gray-100">
                        @if (app()->getLocale() == 'kh' && $item->name_kh)
                            {{ $item->name_kh }}
                        @else
                            {{ $item->name }}
                        @endif
                    </h1>
                    @if ($item->description)
                        <div class="mt-8">
                            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
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
