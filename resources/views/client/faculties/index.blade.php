@extends('layouts.client')
@section('content')
    <section class="font-poppins" style="">
        <!-- Start Breadcrumbs -->
        <section class="py-3 mx-auto my-4 border-2 border-t-0 max-w-7xl border-x-0" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ url('/') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ url('/faculties') }}"
                            class="text-sm font-medium text-gray-700 ms-1 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Faculties
                        </a>
                    </div>
                </li>

            </ol>
        </section>
        <!-- End Breadcrumbs -->

        <!-- Start Main Content -->
        <div class="grid grid-cols-12 gap-4 p-2 mx-auto max-w-7xl">
            <!-- Start Left section -->
            <div class="col-span-12 lg:col-span-3">
                <div class="py-4 pl-8 pr-2 border rounded-md cursor-pointer">
                    <ul class="space-y-3">

                        @forelse ($faculties as $item)
                        <li
                        class="w-full gap-3 list-disc border-gray-200 hover:underline text-leftfont-medium rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400">
                        <a href="{{ url('faculties/'.$item->id) }}">
                            {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                        </a>
                    </li>
                        @empty
                        <li
                        class="w-full gap-3 list-disc border-gray-200 hover:underline text-leftfont-medium rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400">
                        <a href="#">
                            No Faculty ...
                        </a>
                    </li>
                        @endforelse


                    </ul>
                </div>
            </div>
            <!-- End Left Section -->

            <!-- Start Middle section -->
            <div class="col-span-12 border rounded-md lg:col-span-6">
                <!-- Blog Article -->
                <div class="max-w-3xl px-4 pt-6 pb-12 mx-auto sm:px-6 lg:px-8">
                    <div class="max-w-2xl">
                        <!-- Content -->
                        <div class="space-y-5 md:space-y-8">
                            <div class="space-y-3">
                                <h2 class="text-3xl font-bold font-domine md:text-3xl dark:text-white">
                                    Faculty
                                </h2>
                            </div>

                            <figure class="border-2">
                                <img class="object-cover w-full"
                                    src="{{ asset('assets/New Image/photo_2024-06-27_14-02-58 (8).jpg') }}"
                                    alt="Image Description" />
                            </figure>

                            <p class="text-justify text-gray-800 text-md dark:text-neutral-200">
                                As we've grown, we've seen how Preline has
                                helped companies such as Spotify, Microsoft,
                                Airbnb, Facebook, and Intercom bring their
                                designers closer together to create amazing
                                things. We've also learned that when the culture
                                of sharing is brought in earlier, the better
                                teams adapt and communicate with one another.
                            </p>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
                <!-- End Blog Article -->
            </div>
            <!-- End Middle section -->

            <!-- Start Right Section -->
            <div class="col-span-12 space-y-6 lg:col-span-3 no-tailwind">
                <div id="contactbox" class="p-6 bg-white border rounded-lg shadow-lg no-tailwind">
                    {!! app()->getLocale() == 'kh' ? $sideinfo->contact_info_kh : $sideinfo->contact_info !!}
                </div>
            </div>

            <!-- End Right Section -->
        </div>
        <!-- End Main Content -->
    </section>
@endsection
