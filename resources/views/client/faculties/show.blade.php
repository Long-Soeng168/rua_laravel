@extends('layouts.client')
@section('content')
    <section class="font-poppins" style="">
        <!-- Start Breadcrumbs -->
        <section class="px-2 py-3 mx-auto my-4 border-2 border-t-0 max-w-7xl border-x-0" aria-label="Breadcrumb">
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
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ url('faculties/' . $faculty->id) }}"
                            class="text-sm font-medium text-gray-700 ms-1 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                            {{ app()->getLocale() == 'kh' ? $faculty->name_kh : $faculty->name }}
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

                        @forelse ($pages as $item)
                            <li
                                class="w-full gap-3 list-disc border-gray-200 hover:underline hover:font-semibold text-leftfont-medium rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400
                                {{ $page && $page->id == $item->id ? 'underline underline-offset-4 decoration-primary font-semibold' : '' }}
                            ">
                                @if (count($item->pages) > 0 && $item->type != 'dropdown')
                                    <a href="{{ url('faculties/page/' . $item->id) }}">
                                        {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                    </a>
                                @elseif($item->type == 'dropdown')
                                    <a
                                        href="{{ url('faculties/' . $item->faculty_id . '?child=' . $item->id . '&page=' . $item->id) }}">
                                        {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                    </a>
                                @else
                                    <a href="{{ url('faculties/' . $item->faculty_id . '?page=' . $item->id) }}">
                                        {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                    </a>
                                @endif

                            </li>
                        @empty
                            <li
                                class="w-full gap-3 list-disc border-gray-200 hover:underline text-leftfont-medium rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400">
                                <a href="#">
                                    {{ app()->getLocale() == 'kh' ? 'មិនមានទិន្នន័យ' : 'No Data ...' }}

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
                                    @if ($page != null)
                                        {!! app()->getLocale() == 'kh' ? $page->name_kh : $page->name !!}
                                    @else
                                        {{ app()->getLocale() == 'kh' ? $faculty->name_kh : $faculty->name }}
                                    @endif
                                </h2>
                            </div>

                            <p class="text-justify text-gray-800 text-md dark:text-neutral-200">
                            <div class="no-tailwind">
                                @if ($page != null)
                                    {!! app()->getLocale() == 'kh' ? $page->description_kh : $page->description !!}
                                @else
                                    {!! app()->getLocale() == 'kh' ? $faculty->description_kh : $faculty->description !!}
                                @endif
                            </div>
                            </p>
                            {{-- GENERAL SUBJECTS --}}
                            <div id="accordion-collapse" data-accordion="collapse" class="">

                                <div>
                                    <!--  info 1 -->
                                    @if ($child && count($child->pages) > 0 && $child->type == 'dropdown')
                                        @forelse ($child->pages as $index => $item)
                                            @if (count($item->pages) > 0)
                                                <div class="mt-4">
                                                    <h2 class="text-lg font-semibold"
                                                        id="accordion-collapse-heading-{{ $item->id }}">
                                                        {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                                    </h2>
                                                </div>
                                                @forelse ($item->pages as $item)
                                                    <div>
                                                        <h2 id="accordion-collapse-heading-{{ $item->id }}">
                                                            <button type="button"
                                                                class="flex items-center justify-between w-full gap-3 p-3 font-medium text-gray-500 border border-gray-200 text-md font-domine rtl:text-right focus:ring-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                                data-accordion-target="#accordion-collapse-body-{{ $item->id }}"
                                                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                                aria-controls="accordion-collapse-body-{{ $item->id }}">
                                                                <span>
                                                                    {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                                                </span>
                                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5 5 1 1 5" />
                                                                </svg>
                                                            </button>
                                                        </h2>
                                                        <div id="accordion-collapse-body-{{ $item->id }}"
                                                            class="hidden my-2 font-sans"
                                                            aria-labelledby="accordion-collapse-heading-{{ $item->id }}">
                                                            <div class=" border-dotted border-2 border-[#15803d] ">
                                                                <div class="relative overflow-x-auto no-tailwind">
                                                                    {!! app()->getLocale() == 'kh' ? $item->description_kh : $item->description !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            @else
                                                <div>
                                                    <h2 id="accordion-collapse-heading-{{ $item->id }}">
                                                        <button type="button"
                                                            class="flex items-center justify-between w-full gap-3 p-3 text-lg font-medium text-gray-500 border border-gray-200 font-domine rtl:text-right focus:ring-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                            data-accordion-target="#accordion-collapse-body-{{ $item->id }}"
                                                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                            aria-controls="accordion-collapse-body-{{ $item->id }}">
                                                            <span>
                                                                {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                                            </span>
                                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 10 6">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 5 5 1 1 5" />
                                                            </svg>
                                                        </button>
                                                    </h2>
                                                    <div id="accordion-collapse-body-{{ $item->id }}"
                                                        class="hidden my-2 font-sans"
                                                        aria-labelledby="accordion-collapse-heading-{{ $item->id }}">
                                                        <div class=" border-dotted border-2 border-[#15803d] ">
                                                            <div class="relative overflow-x-auto no-tailwind">
                                                                {!! app()->getLocale() == 'kh' ? $item->description_kh : $item->description !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                            <!-- End GENERAL SUBJECTS -->
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
                <!-- End Blog Article -->
            </div>
            <!-- End Middle section -->

            <!-- Start Right Section -->
            <div class="col-span-12 space-y-6 lg:col-span-3 no-tailwind">
                <div id="contactbox" class="p-6 bg-white border rounded-lg shadow-lg">
                    {!! app()->getLocale() == 'kh' ? $faculty->contact_info_kh : $faculty->contact_info !!}
                </div>
            </div>
            <!-- End Right Section -->
        </div>
        <!-- End Main Content -->
    </section>
@endsection
