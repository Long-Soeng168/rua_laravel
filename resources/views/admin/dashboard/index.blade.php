@extends('admin.layouts.admin')
@section('content')
<div class="grid grid-cols-1 gap-6 p-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
      <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
        <img src="{{ asset('assets/icons/user.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
        <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
            {{ $counts['users'] }}
        </span>
      </div>
    </div>
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
        <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
            <img src="{{ asset('assets/icons/faculty.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
            <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
                {{ $counts['faculties'] }}
            </span>
        </div>
    </div>
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
      <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
        <img src="{{ asset('assets/icons/menu.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
        <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
            {{ $counts['menus'] }}
        </span>
      </div>
    </div>
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
      <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
        <img src="{{ asset('assets/icons/news.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
        <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
            {{ $counts['news'] }}
        </span>
      </div>
    </div>
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
      <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
        <img src="{{ asset('assets/icons/procurement.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
        <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
            {{ $counts['procurements'] }}
        </span>
      </div>
    </div>
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
      <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
        <img src="{{ asset('assets/icons/video-list.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
        <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
            {{ $counts['videos'] }}
        </span>
      </div>
    </div>
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
      <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
        <img src="{{ asset('assets/icons/image-gallery.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
        <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
            {{ $counts['galleries'] }}
        </span>
      </div>
    </div>
    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-700">
      <div class="flex flex-col items-center justify-between h-full gap-2 p-4">
        <img src="{{ asset('assets/icons/scholarship.png') }}" alt="icon" class="object-contain w-16 h-16 p-0.5 bg-white dark:bg-gray-200 rounded">
        <span class="text-2xl font-bold text-gray-700 dark:text-gray-300">
            {{ $counts['scholarships'] }}
        </span>
      </div>
    </div>


</div>

    @endsection
