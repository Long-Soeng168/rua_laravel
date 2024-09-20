@extends('layouts.client')
@section('content')
    <section class="font-poppins" style="">
        <!-- Start Main Content -->
        <div class="grid grid-cols-12 gap-4 p-2 mx-auto max-w-7xl">

            <!-- Start Middle section -->
            <div class="col-span-12 rounded-md lg:col-span-9">
                <div class="w-full py-4">
                    <h2 class="text-3xl font-bold font-domine md:text-3xl dark:text-white">
                        {!! app()->getLocale() == 'kh' ? $item->name_kh : $item->name !!}
                    </h2>
            </div>
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($multi_images as $index => $image)
                            <a href="{{ asset('assets/images/images/thumb/' . $image->image) }}"
                                class="glightbox">
                                <img class="bg-white w-full aspect-[1/1] hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border shadow-md"
                                    src="{{ asset('assets/images/images/thumb/' . $image->image) }}">
                            </a>
                    @endforeach
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

