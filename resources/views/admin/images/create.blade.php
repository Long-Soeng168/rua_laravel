@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Gallery')" class="p-4" />

        @livewire('image-create')

    </div>
@endsection
