<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $websiteInfo->name }}</title>

    <!-- Start CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pdfview.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/audioplayer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/no-tailwind.css') }}" />

    <!-- <style>
        body ::selection {
            background-color: goldenrod; /* This is bg-blue-900 in Tailwind */
            color: white; /* This is text-white in Tailwind */
        }
    </style> -->

    <!-- end Start CSS -->

    <!-- Start JS -->
    <script src="{{ asset('assets/js/tailwind34.js') }}"></script>
    <script src="{{ asset('assets/js/darkModeHead.js') }}"></script>
    <script src="{{ asset('assets/js/swiper11.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/tailwind.config.js') }}"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Moul&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Siemreap&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "false", // Enables dark mode based on class
            theme: {
                extend: {
                    colors: {
                        clifford: "#da373d",
                        // primary: "#00aff0",
                        // primaryHover: "#0a9fd5",
                        primary: "{{ $websiteInfo->primary }}",
                        primaryHover: "{{ $websiteInfo->primary_hover }}",
                        bannerColor: "{{ $websiteInfo->banner_color }}",
                        warning: "#fab105",
                        warningHover: "#ffb915",
                    },
                },
                fontFamily: {
                    moul: [
                        "Moul", "Siemreap", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system",
                        "system-ui", "Segoe UI", "Helvetica Neue",
                    ],
                    siemreap: [
                        "Siemreap", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system", "system-ui",
                        "Segoe UI", "Helvetica Neue",
                    ],
                    poppins: [
                        "Poppins", "Roboto", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system",
                        "system-ui", "Segoe UI", "Helvetica Neue",
                    ],

                },
            },
        };
    </script>
    <script defer src="{{ asset('assets/js/alpine31.js') }}"></script>
    <script defer src="{{ asset('assets/js/darkMode.js') }}"></script>
    <script defer src="{{ asset('assets/js/flowbite23.js') }} "></script>
    <script defer src="{{ asset('assets/js/pdfPopup.js') }}"></script>
    <script defer src="{{ asset('assets/js/glightbox.js') }}"></script>
    <script defer src="{{ asset('assets/js/glightbox.config.js') }}"></script>
    <!-- End JS -->

    {{-- Start PWA --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ $websiteInfo->name }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/website_infos/logo.png') }}">
    <link rel="apple-touch-startup-image" href="{{ asset('assets/images/website_infos/logo.png') }}">
    <link rel="icon" href="{{ asset('assets/images/website_infos/logo.png') }}">

    <link rel="manifest" href="{{ asset('/manifest.json') }}">


    {{-- End PWA --}}
</head>

<body
    class="w-full overflow-x-hidden leading-7 dark:bg-gray-800 {{ app()->getLocale() == 'kh' ? 'font-siemreap' : 'font-poppins' }}">
    @include('components.success-message')

    {{-- Start Header --}}
    <Header class="">
        <section class="relative max-w-screen-xl px-2 mx-auto">
            <div class="grid items-center grid-cols-12 ">
                <div
                    class="relative flex items-center gap-4 justify-start w-full max-[1011px]:col-span-12 col-span-1 p-2 hover:cursor-pointer">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('/assets/images/image1.png') }}"
                            class="relative object-contain w-20 rounded-md">
                    </a>
                    <a class="grid  max-[1011px]:hidden absolute left-[6rem] top-16  text-nowrap"
                        href="{{ url('/') }}">
                        <h1 class="text-[18px] font-moul">សាកលវិទ្យាល័យភូមិន្ទកសិកម្ម</h1>
                        <h2 class="text-[18px] font-poppins">Royal University of Agriculture </h2>
                    </a>
                    <a class="min-[1011px]:hidden translate-y-2" href="{{ url('/') }}">
                        <h1 class="text-[18px] font-moul">សាកលវិទ្យាល័យភូមិន្ទកសិកម្ម</h1>
                        <h2 class="text-[18px] font-poppins">Royal University of Agriculture </h2>
                    </a>
                </div>

                <div class="justify-end h-full max-[1011px]:hidden col-span-11 p-2 mt-8">
                    <div class="flex flex-col order-1 w-full gap-5 " id="navbar-dropdown">
                        <nav class="block w-full border-gray-200 ">
                            <div class="flex flex-wrap items-center justify-end max-w-screen-xl mx-auto">

                                <div class=" w-full md:block text-[12px]  md:w-auto" id="navbar-default">
                                    <ul class="flex justify-end font-medium">
                                        <li
                                            class="flex items-center px-2 leading-4 text-gray-900 border-[#15803d] border-r max-w-72 hover:underline hover:decoration-[#15803d]">
                                            <a href="{{ url('/') }}">
                                                <p class="p-1 text-center">
                                                    {{ app()->getLocale() == 'kh' ? 'ទំព័រដើម' : 'Home' }}
                                                </p>
                                            </a>
                                        </li>
                                        @forelse ($top_menus as $item)
                                            @if ($item->is_show_dropdown)
                                                <li
                                                    class="flex items-center px-2 leading-4 text-gray-900 border-[#15803d] border-r max-w-44 hover:underline hover:decoration-[#15803d]">
                                                    <button id="dropdownButton{{ $item->id }}"
                                                        data-dropdown-toggle="dropdownItem{{ $item->id }}"
                                                        class="flex items-center p-1 text-center " type="button">
                                                        {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 4 4 4-4" />
                                                        </svg>
                                                    </button>

                                                    <div id="dropdownItem{{ $item->id }}"
                                                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-[27¸0px] dark:bg-gray-700">
                                                        <ul class="py-2 text-sm text-gray-700 border-none text-wrap dark:text-gray-200"
                                                            aria-labelledby="dropdownButton{{ $item->id }}">
                                                            @forelse ($item->pages as $page)
                                                                @if ($page->parent_id)
                                                                    @continue;
                                                                @endif
                                                                @if (count($page->pages) > 0)
                                                                    <li>
                                                                        <div class="flex">
                                                                            <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id) }}"
                                                                                class="flex-1 py-2 pl-6 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                                {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                                            </a>
                                                                            <button
                                                                                id="doubleDropdownButton{{ $page->id }}"
                                                                                data-dropdown-toggle="doubleDropdown{{ $page->id }}"
                                                                                data-dropdown-placement="bottom-start"
                                                                                type="button"
                                                                                class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                                <svg class="w-3 h-3 rotate-90"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 6 10">
                                                                                    <path stroke="currentColor"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="m1 9 4-4-4-4" />
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                        <div id="doubleDropdown{{ $page->id }}"
                                                                            class="relative z-30 hidden bg-gray-100 divide-y divide-gray-200 rounded-lg shadow w-[250px] dark:bg-gray-500 ml-2">
                                                                            <div
                                                                                class="absolute z-[-1] w-6 h-6 bg-gray-100 dark:bg-gray-500 transform rotate-45 -top-1.5 left-3">
                                                                            </div>
                                                                            <ul class="py-2 text-sm text-gray-700 border-none dark:text-gray-200"
                                                                                aria-labelledby="doubleDropdownButton{{ $page->id }}">
                                                                                @forelse ($page->pages as $subPage)
                                                                                    <li>
                                                                                        <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id . '&childId=' . $subPage->id) }}"
                                                                                            class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                                            {{ app()->getLocale() == 'kh' ? $subPage->name_kh : $subPage->name }}

                                                                                        </a>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                @else
                                                                    <li>
                                                                        <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id) }}"
                                                                            class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                            {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </li>
                                            @else
                                                <li
                                                    class="flex items-center px-2 leading-4 text-gray-900 border-[#15803d] border-r max-w-44 hover:underline hover:decoration-[#15803d]">
                                                    <a href="{{ url('menus/' . $item->id) }}">
                                                        <p class="p-1 text-center">
                                                            {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                                        </p>
                                                    </a>
                                                </li>
                                            @endif

                                        @empty
                                        @endforelse

                                    </ul>
                                </div>
                            </div>
                        </nav>

                    </div>
                </div>

            </div>
            {{-- Start Language --}}
            <div class="absolute max-[1011px]:hidden bottom-0 right-0 p-4">
                <a href="{{ route('switch-language', ['locale' => 'kh']) }}" type="button"
                    class="{{ app()->getLocale() == 'kh' ? 'bg-gray-100' : '' }} inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200 dark:hover:text-white">
                    <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/khmer.png') }}" alt="" />
                </a>
                <a href="{{ route('switch-language', ['locale' => 'en']) }}" type="button"
                    class="{{ app()->getLocale() == 'en' ? 'bg-gray-100' : '' }} inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-white">
                    <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/english.png') }}"
                        alt="" />
                </a>
            </div>
            {{-- End Language --}}
        </section>
        {{-- Start Bottom Navbar --}}
        <section class="px-2 max-[1011px]:py-2 border-gray-200 bg-primary">
            <nav class="max-w-screen-xl px-4 mx-auto">
                <ul class="text-[12px] max-[1011px]:hidden flex justify-end font-medium">
                    @forelse ($bottom_menus as $index => $item)
                        @if ($index == 1)
                            <li
                                class="flex items-center px-1 leading-4 text-white border-r border-white max-w-[135px] p-1 hover:bg-white hover:text-primary">
                                <button id="dropdownButtonfaculty" data-dropdown-toggle="dropdownItemfaculty"
                                    class="flex items-center p-1 text-center " type="button">
                                    {{ app()->getLocale() == 'kh' ? 'មហាវិទ្យាល័យ' : 'Faculty' }}
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <div id="dropdownItemfaculty"
                                    class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-[27¸0px] dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 border-none text-wrap dark:text-gray-200"
                                        aria-labelledby="dropdownButtonfaculty">
                                        @forelse ($faculties as $page)
                                            <li>
                                                <a href="{{ url('faculties/' . $page->id) }}"
                                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                </a>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </li>
                        @endif
                        @if ($item->is_show_dropdown)
                            <li
                                class="flex items-center px-1 leading-4 text-white border-r border-white max-w-[135px] p-1 hover:bg-white hover:text-primary">
                                <button id="dropdownButton{{ $item->id }}"
                                    data-dropdown-toggle="dropdownItem{{ $item->id }}"
                                    class="flex items-center p-1 text-center " type="button">
                                    {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <div id="dropdownItem{{ $item->id }}"
                                    class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-[27¸0px] dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 border-none text-wrap dark:text-gray-200"
                                        aria-labelledby="dropdownButton{{ $item->id }}">
                                        @forelse ($item->pages as $page)
                                            @if ($page->parent_id)
                                                @continue;
                                            @endif
                                            @if (count($page->pages) > 0)
                                                <li>
                                                    <div class="flex">
                                                        <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id) }}"
                                                            class="flex-1 py-2 pl-6 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                        </a>
                                                        <button id="doubleDropdownButton{{ $page->id }}"
                                                            data-dropdown-toggle="doubleDropdown{{ $page->id }}"
                                                            data-dropdown-placement="bottom-start" type="button"
                                                            class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="w-3 h-3 rotate-90" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 6 10">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 9 4-4-4-4" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div id="doubleDropdown{{ $page->id }}"
                                                        class="relative z-30 hidden bg-gray-100 divide-y divide-gray-200 rounded-lg shadow w-[250px] dark:bg-gray-500 ml-2">
                                                        <div
                                                            class="absolute z-[-1] w-6 h-6 bg-gray-100 dark:bg-gray-500 transform rotate-45 -top-1.5 left-3">
                                                        </div>
                                                        <ul class="py-2 text-sm text-gray-700 border-none dark:text-gray-200"
                                                            aria-labelledby="doubleDropdownButton{{ $page->id }}">
                                                            @forelse ($page->pages as $subPage)
                                                                <li>
                                                                    <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id . '&childId=' . $subPage->id) }}"
                                                                        class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                        {{ app()->getLocale() == 'kh' ? $subPage->name_kh : $subPage->name }}

                                                                    </a>
                                                                </li>
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id) }}"
                                                        class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                    </a>
                                                </li>
                                            @endif
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li
                                class="flex items-center px-1 leading-4 text-white border-r border-white max-w-[135px] p-1 hover:bg-white hover:text-primary">
                                <a href="{{ url('menus/' . $item->id) }}">
                                    <p class="p-1 text-center">
                                        {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                    </p>
                                </a>
                            </li>
                        @endif

                    @empty
                    @endforelse
                </ul>
            </nav>
            {{-- Start Menu Drawer --}}
            <div class="min-[1011px]:hidden text-white flex justify-end items-center gap-2">
                <span>
                    <a href="{{ route('switch-language', ['locale' => 'kh']) }}" type="button"
                        class="{{ app()->getLocale() == 'kh' ? 'bg-gray-100' : '' }} inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200 dark:hover:text-white">
                        <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/khmer.png') }}"
                            alt="" />
                    </a>
                    <a href="{{ route('switch-language', ['locale' => 'en']) }}" type="button"
                        class="{{ app()->getLocale() == 'en' ? 'bg-gray-100' : '' }} inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-white">
                        <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/english.png') }}"
                            alt="" />
                    </a>
                </span>

                <!-- drawer init and toggle -->
                <div class="text-center">
                    <button type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                        aria-controls="drawer-example">
                        <span
                            class="inline-flex items-center justify-center p-2 text-sm font-medium text-white rounded-lg cursor-pointer hover:text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-align-justify">
                                <path d="M3 12h18" />
                                <path d="M3 18h18" />
                                <path d="M3 6h18" />
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- drawer component -->
                <div id="drawer-example"
                    class="fixed top-0 left-0 z-40 h-screen p-2 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-label">
                    <h5 id="drawer-label"
                        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        Menu
                    </h5>
                    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close menu</span>
                    </button>

                    <ul>
                        @forelse ($top_menus as $item)
                            <li>
                                @if (count($item->pages) > 0)
                                    <button
                                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                        aria-controls="menu-dropdown-item{{ $item->id }}"
                                        data-collapse-toggle="menu-dropdown-item{{ $item->id }}">
                                        <span class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                            {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                        </span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <ul id="menu-dropdown-item{{ $item->id }}"
                                        class="hidden py-2 ml-6 space-y-1">
                                        @forelse ($item->pages as $page)
                                            <li>
                                                @if (count($page->pages) > 0)
                                                    <button type="button"
                                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 border-l border-gray-400 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                                        aria-controls="menu-double-dropdown{{ $page->id }}"
                                                        data-collapse-toggle="menu-double-dropdown{{ $page->id }}">
                                                        <span
                                                            class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                                            {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                        </span>
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 4 4 4-4" />
                                                        </svg>
                                                    </button>
                                                    <ul id="menu-double-dropdown{{ $page->id }}"
                                                        class="hidden py-2 pl-4 space-y-1">
                                                        @forelse ($page->pages as $subPage)
                                                            <li class="border-l border-gray-400">
                                                                <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id . '&childId=' . $subPage->id) }}"
                                                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                                                    <span class="line-clamp-3">
                                                                        {{ app()->getLocale() == 'kh' ? $subPage->name_kh : $subPage->name }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                @else
                                                    <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id) }} }}"
                                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 border-l border-gray-400 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                                        aria-controls="menu-double-dropdown{{ $page->id }}"
                                                        data-collapse-toggle="menu-double-dropdown{{ $page->id }}">
                                                        <span
                                                            class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                                            {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                        </span>

                                                    </a>
                                                @endif
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                @else
                                    <a href="{{ url('menus/' . $item->id) }}"
                                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        <span class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                            {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                        </span>

                                    </a>
                                @endif
                            </li>
                        @empty
                        @endforelse

                    </ul>

                    <ul class="pt-4 mt-4 border-t">

                        <li>
                                <button
                                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                    aria-controls="menu-dropdown-item-faculties"
                                    data-collapse-toggle="menu-dropdown-item-faculties">
                                    <span class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                        {{ app()->getLocale() == 'kh' ? 'មហាវិទ្យាល័យ' : 'Faculty' }}
                                    </span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <ul id="menu-dropdown-item-faculties" class="hidden py-2 ml-6 space-y-1">
                                    @forelse ($faculties as $item)
                                        <li>

                                            <a href="{{ url('faculties/' . $item->id) }} }}"
                                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 border-l border-gray-400 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                                aria-controls="menu-double-dropdown{{ $item->id }}"
                                                data-collapse-toggle="menu-double-dropdown{{ $item->id }}">
                                                <span class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                                    {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                                </span>

                                            </a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                        </li>


                        @forelse ($bottom_menus as $item)
                            <li>
                                @if (count($item->pages) > 0)
                                    <button
                                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                        aria-controls="menu-dropdown-item{{ $item->id }}"
                                        data-collapse-toggle="menu-dropdown-item{{ $item->id }}">
                                        <span class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                            {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                        </span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <ul id="menu-dropdown-item{{ $item->id }}"
                                        class="hidden py-2 ml-6 space-y-1">
                                        @forelse ($item->pages as $page)
                                            <li>
                                                @if (count($page->pages) > 0)
                                                    <button type="button"
                                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 border-l border-gray-400 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                                        aria-controls="menu-double-dropdown{{ $page->id }}"
                                                        data-collapse-toggle="menu-double-dropdown{{ $page->id }}">
                                                        <span
                                                            class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                                            {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                        </span>
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 4 4 4-4" />
                                                        </svg>
                                                    </button>
                                                    <ul id="menu-double-dropdown{{ $page->id }}"
                                                        class="hidden py-2 pl-4 space-y-1">
                                                        @forelse ($page->pages as $subPage)
                                                            <li class="border-l border-gray-400">
                                                                <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id . '&childId=' . $subPage->id) }}"
                                                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                                                    <span class="line-clamp-3">
                                                                        {{ app()->getLocale() == 'kh' ? $subPage->name_kh : $subPage->name }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                @else
                                                    <a href="{{ url('menus/' . $item->id . '?pageId=' . $page->id) }} }}"
                                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 border-l border-gray-400 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                                        aria-controls="menu-double-dropdown{{ $page->id }}"
                                                        data-collapse-toggle="menu-double-dropdown{{ $page->id }}">
                                                        <span
                                                            class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                                            {{ app()->getLocale() == 'kh' ? $page->name_kh : $page->name }}
                                                        </span>

                                                    </a>
                                                @endif
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                @else
                                    <a href="{{ url('menus/' . $item->id) }}"
                                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        <span class="flex-1 text-left ms-2 rtl:text-right line-clamp-3">
                                            {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                        </span>

                                    </a>
                                @endif
                            </li>
                        @empty
                        @endforelse

                    </ul>
                </div>


                {{-- End Menu Drawer --}}
            </div>
        </section>
        {{-- End Bottom Navbar --}}

    </Header>
    {{-- End Header  --}}
    <div class="font-siemreap">

        @yield('content')
    </div>

    {{-- Start Foolter --}}
    <footer class="w-full mt-20 bg-gray-300 font-poppins">
        <div class="px-8 mx-auto lg:px-0 lg:max-w-screen-xl">
            <div class="grid row-gap-6 py-8 space-y-8 lg:space-y-0 lg:grid-cols-12">
                <div class="col-span-4">
                    <a href="#" aria-label="Go home" title="Company" class="flex items-end">
                        <img src="{{ asset('assets/images/website_infos/' . $websiteInfo->image) }}" alt="logos"
                            class="w-[70px] h-[70px] object-contain">
                        <div class="">
                            <p class="ml-2 font-bold tracking-wide text-gray-800 uppercase text-md font-moul">
                                {{ $websiteInfo->name_kh }}
                            </p>
                            <p class="ml-2 text-sm tracking-wide text-gray-800 uppercase">
                                {{ $websiteInfo->name }}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-span-2 text-start">
                    <p class="mb-2 text-base font-bold tracking-wide text-gray-900 font-domine">Visitors Count</p>
                    <a href="https://info.flagcounter.com/vLTU"><img
                            src="https://s01.flagcounter.com/count2/vLTU/bg_FFFFFF/txt_000000/border_FFFFFF/columns_2/maxflags_6/viewers_0/labels_0/pageviews_0/flags_0/percent_0/"
                            alt="Flag Counter" border="0"></a>
                </div>
                <div class="col-span-3 text-sm text-start ">
                    <p class="mb-2 text-base font-bold tracking-wide text-gray-900 font-domine">
                        {{ app()->getLocale() == 'kh' ? $footer->name_kh : $footer->name }}
                    </p>
                    <div class="no-tailwind text-start">
                        {!! app()->getLocale() == 'kh' ? $footer->description_kh : $footer->description !!}
                    </div>
                </div>
                <div class="col-span-3 text-sm lg:text-center ">
                    <p class="mb-2 text-base font-bold tracking-wide text-gray-900 font-domine">Social</p>
                    <div class="flex gap-4 lg:justify-center">
                        @forelse ($links as $item)
                            <div class="flex flex-col items-center gap-2">
                                <a href="{{ $item->link }}"
                                    class="text-gray-500 transition-colors duration-300 hover:scale-110">
                                    <img class="object-contain w-10 h-10"
                                        src="{{ asset('assets/images/links/' . $item->image) }}" alt="">
                                </a>
                                <p>
                                    {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                </p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
                <p class="text-sm text-gray-600">
                    {{ app()->getLocale() == 'kh' ? $footer->copyright_kh : $footer->copyright }}
                </p>
                <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">

                </ul>
            </div>
        </div>
    </footer>
    {{-- End Foolter --}}

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js').then(registration => {
                    console.log('Service Worker registered with scope:', registration.scope);
                }).catch(error => {
                    console.log('Service Worker registration failed:', error);
                });
            });
        }
    </script>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js').then(registration => {
                    console.log('Service Worker registered with scope:', registration.scope);
                }).catch(error => {
                    console.log('Service Worker registration failed:', error);
                });
            });
        }
    </script>
    <script>
        let deferredPrompt;
        const addBtn = document.getElementById('add-to-home-screen');

        // Check if the browser supports the beforeinstallprompt event
        if ('onbeforeinstallprompt' in window) {
            // addBtn.style.display = 'none';

            window.addEventListener('beforeinstallprompt', (e) => {
                e.preventDefault();
                deferredPrompt = e;
                addBtn.style.display = 'block';

                addBtn.addEventListener('click', () => {
                    deferredPrompt.prompt();
                    deferredPrompt.userChoice.then((choiceResult) => {
                        if (choiceResult.outcome === 'accepted') {
                            console.log('User accepted the A2HS prompt');
                        } else {
                            console.log('User dismissed the A2HS prompt');
                        }
                        deferredPrompt = null;
                    });
                });
            });
        } else {
            // Fallback for browsers that don't support the beforeinstallprompt event (e.g., Safari on iOS)
            addBtn.style.display = 'block';
            addBtn.addEventListener('click', () => {
                alert(
                    `{{ app()->getLocale() == 'kh' ? 'ដើម្បីតម្លើងកម្មវិធីនេះ សូមបើកម៉ឺនុយកម្មវិធីរុករក ហើយជ្រើសរើស : Add to Home Screen' : 'To intall this app, open the browser menu and select : Add to Home Screen' }}`
                );
            });
        }
    </script>
    {{-- <script>
        let deferredPrompt;
        const addBtn = document.getElementById('add-to-home-screen');
        addBtn.style.display = 'none';

        window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent the mini-infobar from appearing on mobile
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        // Update UI notify the user they can add to home screen
        addBtn.style.display = 'block';

        addBtn.addEventListener('click', () => {
            // Show the install prompt
                deferredPrompt.prompt();
                // Wait for the user to respond to the prompt
                deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the A2HS prompt');
                } else {
                    console.log('User dismissed the A2HS prompt');
                }
                deferredPrompt = null;
                });
            });
        });
    </script> --}}

</body>

</html>
