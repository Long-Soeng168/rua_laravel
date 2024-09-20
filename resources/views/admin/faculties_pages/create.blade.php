@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Faculty Page')" class="p-4" />

        @livewire('faculty-page-create')

    </div>
@endsection
