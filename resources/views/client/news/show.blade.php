@extends('layouts.client')
@section('content')
    <section class="font-poppins" style="">
        <!-- Start Main Content -->
        <div class="grid grid-cols-12 gap-4 p-2 mx-auto max-w-7xl">

            <!-- Start Middle section -->
            <div class="col-span-12 border rounded-md lg:col-span-9">
                <!-- Blog Article -->
                <div class="w-full p-8">
                        <!-- Content -->
                        <h2 class="mb-8 text-3xl font-bold font-domine md:text-3xl dark:text-white">
                            {!! app()->getLocale() == 'kh' ? $page->name_kh : $page->name !!}
                        </h2>
                        <a href="{{ asset('assets/images/news/' . $page->image) }}" class="glightbox">
                            <img class="object-cover w-full mb-8 rounded-lg"
                                src="{{ asset('assets/images/news/' . $page->image) }}">
                        </a>
                        <div class="no-tailwind">
                            {!! app()->getLocale() == 'kh' ? $page->description_kh : $page->description !!}
                        </div>
                        <!-- End Content -->
                </div>
                <!-- End Blog Article -->
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
