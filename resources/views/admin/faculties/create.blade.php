@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Faculty')" class="p-4" />

        @livewire('faculty-create')

    </div>
@endsection
