@extends('layouts.client')
@section('content')
    {{-- Start Body --}}
    <!--SLIDE SHOW-->

    <div class="max-w-screen-xl p-4 mx-auto">
        <swiper-container autoplay="true" autoplay-delay="3000" speed="1000" effect="slide" class="mySwiper" pagination="true"
            pagination-clickable="true" space-between="30" loop="true">
            @forelse ($slides as $slide)
                <swiper-slide class="overflow-hidden rounded-xl swiper-slide-item">
                    <a href="{{ asset('assets/images/slides/' . $slide->image) }}"
                        class="w-full overflow-hidden rounded-lg glightbox">
                        <img class="object-cover w-full h-full swiper-slide-img"
                            src="{{ asset('assets/images/slides/thumb/' . $slide->image) }}" alt="" />
                    </a>
                </swiper-slide>
            @empty
            @endforelse
        </swiper-container>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    </div>


    <!--option-->
    <div>
        <div class="flex justify-center px-10 pt-10 my-5 pb-7">
            <a
                class="border-solid  border-b text-xl text-gray-600 hover:px-5 py-3 transision duration-300 hover:bg-[#078e3b] hover:text-white">Faculties
                / Divisions
            </a>
        </div>
    </div>

    <div id="option" class="flex items-center justify-center p-4 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
            {{-- Item 1 --}}
            @forelse ($homepageLinks as $item)
                <a href="{{ $item->link }}"
                    class="relative w-full h-full duration-300 rounded-lg shadow-md cursor-pointer transistion aspect-video hover:-translate-y-1 hover:scale-105">
                    <img src="{{ asset('assets/images/students/thumb/' . $item->image) }}"
                        class="object-cover w-full h-full rounded-lg">
                    <div
                        class="absolute bottom-0 left-0 right-0 h-16 p-4 text-center text-white bg-black bg-opacity-50 rounded-b-lg">
                        <h1 class="text-2xl font-semibold">
                            {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                        </h1>
                        <!-- <p class="mt-2"></p> -->
                    </div>
                </a>
            @empty
            @endforelse
            <div
                class="transition duration-300 ease-in-out border w-full aspect-video relative shadow-sm rounded-lg cursor-pointer hover:shadow-lg hover:border-[#15803d]">
                <p class="mx-5 mt-2 uppercase font-siemreap">Scholarships</p>
                <ul class="pr-4 pl-7">
                    @forelse ($scholarships as $item)
                        <a href="{{ asset('assets/pdf/journals/'.$item->pdf) }}">
                            <li class="list-disc text-[#15803d]">
                                <span>
                                    <p class="line-clamp-1">
                                        {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                    </p>
                                    <p class="text-gray-500 text-end">
                                        Posted at : {{ $item->created_at?->format('Y-M-d') }}
                                    </p>
                                </span>
                            </li>
                        </a>
                    @empty
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
    <!--End Option-->

    <!--news -->
    <!--button-->
    <div class="px-4 mx-auto mb-6 max-w-7xl ">
        <div class="my-10">
            <div class="flex justify-center gap-10 px-10 py-5 mx-2">
                <a href="{{ url('/news') }}"
                    class="border-solid border-b text-xl  px-5 py-3 transision duration-300 bg-[#078e3b] text-white hover:underline font-bold underline-offset-2">News
                </a>
                <a href="{{ url('/procurements') }}"
                    class="border-solid border-b text-xl text-gray-600 hover:px-5 py-3 transision duration-300 hover:bg-[#078e3b] hover:text-white hover:underline underline-offset-2">Procurement

                </a>
            </div>
        </div>

        <!--Swiper News-->
        <div class="grid grid-cols-12 gap-5 mx-auto my-10 mt-3 max-w-7xl">
            <div class="col-span-12 overflow-hidden border rounded-md lg:col-span-4 ">
                <div class="relative ">
                    <a href="{{ url('news/' . $news->first()->id) }}">
                        <div class="w-full">
                            <img class="object-cover w-full aspect-video "
                                src="{{ asset('assets/images/news/thumb/' . $news->first()->image) }}">
                        </div>
                        <div class="p-2">
                            <h5
                                class="mt-2 ml-3 text-lg font-bold leading-8 cursor-pointer text-slate-600 hover:underline hover:opacity-90 line-clamp-1">
                                {{ app()->getLocale() == 'kh' ? $news->first()->name_kh : $news->first()->name }}
                            </h5>
                            <div class="ml-3 leading-8 cursor-pointer text-slate-400 hover:opacity-90 line-clamp-2">
                                {!! app()->getLocale() == 'kh' ? $news->first()->description_kh : $news->first()->description !!}
                            </div>

                        </div>
                    </a>
                </div>
            </div>
            <div class="grid col-span-12 gap-5 lg:col-span-8">
                @forelse ($news as $index => $item)
                    @if ($index == 0)
                        @continue
                    @endif
                    <a href="{{ url('news/' . $item->id) }}"
                        class="flex items-center bg-white   rounded-lg border flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 h-[110px] lg:h-[160px] overflow-hidden">
                        <img class="object-cover h-full aspect-video "
                            src="{{ asset('assets/images/news/thumb/' . $item->image) }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <div>
                                <h5
                                    class="font-bold text-left text-[14px] lg:text-[16px] text-slate-600 cursor-pointer hover:underline hover:opacity-90 line-clamp-1 lg:line-clamp-2 leading-relaxed">
                                    {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                </h5>
                            </div>
                            <div>
                                <h5
                                    class="text-slate-400 text-left text-[12px] lg:text-[14px] cursor-pointer hover:opacity-90 line-clamp-2 leading-loose no-tailwind">
                                    {!!  app()->getLocale() == 'kh' ? $item->description_kh : $item->description !!}
                                </h5>
                            </div>
                        </div>
                    </a>
                @empty
                @endforelse
            </div>
        </div>
        <a href="#" class="flex justify-end col-span-3 mt-4 mr-4 text-slate-700 text-end">
            <span class=" hover:text-slate-900 hover:underline hover:underline-offset-4">

            </span>
        </a>
        <!--End Swiper News-->
    </div>

    <!--INFORMATION -->

    <!--BUTTON-->
    {{-- <div class="bg-[#15803d]  ">
        <div class="flex justify-center py-6">
            <a
                class="px-4 py-3 text-xl uppercase transition duration-300 transform border-b border-solid shadow-lg texthover:-wh5e hover:scale-105">
                Information
            </a>
        </div>
        <!-- CONTAINERS -->
        <div class="pb-10 mx-auto max-w-7xl">
            <div class="grid grid-cols-2 gap-10">

                <a href="#"
                    class="mx-auto bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100">

                    <img class="object-cover w-full h-full rounded-lg rounded-t-lg rounded-s-lg hover:opacity-80"
                        src="{{ asset('assets/New Image/5b66aa9a7db6ddb89cd5e0f5b0af2807.jpg') }}" alt="">
                </a>
                <a href="#"
                    class="mx-auto bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100">

                    <img class="object-cover w-full h-full rounded-lg rounded-t-lg rounded-s-lg hover:opacity-80"
                        src="{{ asset('assets/New Image/16107572_704354176413418_4398238422947701313_o.jpg') }}"
                        alt="">
                </a>

            </div>
        </div>
    </div> --}}


    </div>

    <div class="flex items-center justify-center my-10 mb-16 font-sans">
        <div x-data="{ openTab: 1 }" class="w-full mx-2">
            <div class="mx-auto max-w-7xl">
                <div class="flex p-1 space-x-4 text-xl bg-white border rounded-lg shadow mb-7">
                    <button x-on:click="openTab = 1" :class="{ 'bg-green-600 text-white': openTab === 1 }"
                        class="flex-1 px-4 py-2 transition-all duration-300 rounded-md focus:outline-none focus:shadow-outline-blue">Video
                    </button>
                    <button x-on:click="openTab = 2" :class="{ 'bg-green-600 text-white': openTab === 2 }"
                        class="flex-1 px-4 py-2 transition-all duration-300 rounded-md focus:outline-none focus:shadow-outline-blue">Photos
                    </button>
                </div>

                <div x-show="openTab === 1"
                    class="p-4 pr-0 transition-all duration-300 bg-white border-l-4 border-green-600 rounded-lg">
                    <!--Swiper Video-->
                    <div class="grid grid-cols-12 gap-5 mx-auto max-w-7xl" style="">
                        <div class="col-span-12 overflow-hidden border rounded-md lg:col-span-4">
                            <div class="relative">
                                <a href="{{ url('videos/' . $videos->first()->id) }}">
                                    <div class="w-full">
                                        <img class="object-cover w-full aspect-video "
                                            src="{{ asset('assets/images/videos/thumb/' . $videos->first()->image) }}">
                                    </div>
                                    <div class="p-2">

                                        <h5
                                            class="ml-3 text-lg font-bold leading-8 cursor-pointer text-slate-600 hover:underline hover:opacity-90 line-clamp-1">
                                            {{ app()->getLocale() == 'kh' ? $videos->first()->name_kh : $videos->first()->name }}
                                        </h5>
                                        <h6
                                            class="ml-3 leading-8 cursor-pointer text-slate-400 hover:opacity-90 line-clamp-2">
                                            <div>
                                                {!! app()->getLocale() == 'kh' ? $videos->first()->description_kh : $videos->first()->description !!}
                                            </div>
                                        </h6>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="grid w-full col-span-12 gap-5 lg:col-span-8 ">
                            @forelse ($videos as $index => $item)
                                @if ($index == 0)
                                    @continue
                                @endif
                                <a href="{{ url('videos/' . $item->id) }}"
                                    class="flex items-center w-full bg-white border border-gray-200 rounded-lg shadow flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 h-[110px] lg:h-[160px] overflow-hidden">
                                    <div class="relative h-full aspect-video">
                                        <img class="object-cover w-full h-full"
                                            src="{{ asset('assets/images/videos/thumb/' . $item->image) }}">
                                    </div>

                                    <div class="flex flex-col justify-between flex-1 w-full p-4 leading-normal">
                                        <div>
                                            <h5
                                                class="font-bold text-left text-[14px] lg:text-[16px] text-slate-600 cursor-pointer hover:underline hover:opacity-90 line-clamp-1 lg:line-clamp-2 leading-relaxed">
                                                {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                            </h5>
                                        </div>
                                        <div>
                                            <h5
                                                class="text-slate-400 text-left text-[12px] lg:text-[14px] cursor-pointer hover:opacity-90 line-clamp-2 leading-loose no-tailwind">
                                                {!!  app()->getLocale() == 'kh' ? $item->description_kh : $item->description !!}
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            @empty
                            @endforelse


                        </div>
                    </div>
                    <a href="#" class="flex justify-end col-span-3 mt-4 mr-4 text-slate-700 text-end">
                        <span class=" hover:text-slate-900 hover:underline hover:underline-offset-4">
                        </span>
                    </a>
                    <!--End Swiper Video-->

                </div>

                <div x-show="openTab === 2"
                    class="p-4 transition-all duration-300 bg-white border-l-4 border-green-600 rounded-lg">
                    <div class="grid mx-auto max-w-7xl h-96 ">
                        <div class="flex swiper-gallery ">
                            @forelse ($images as $item)
                                <div role="group" class="div-active" style="width: 381.333px; margin-right: 50px;">
                                    <div class="relative w-full bg-red-100 aspect-square">
                                        <a href="{{ url('images/' . $item->id) }}" class="group">
                                            <div class="absolute inset-0 z-0 bg-center bg-cover">
                                                <img class="object-cover w-full h-full duration-300 rounded-lg group-hover:scale-105 brightness-50 group-hover:brightness-100 transistion"
                                                    src="{{ asset('assets/images/images/thumb/' . $item->image) }}">
                                            </div>
                                            <div
                                                class="absolute z-10 flex items-center justify-center w-full px-4 text-2xl font-semibold text-center text-white aspect-square transistion">
                                                {{ app()->getLocale() == 'kh' ? $item->name_kh : $item->name }}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    {{-- End Body --}}
@endsection
