@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Info')" class="p-4" />

        @livewire('faculty-info',)

    </div>
@endsection
