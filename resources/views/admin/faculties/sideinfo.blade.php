@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Side Info')" class="p-4" />

        @livewire('side-info',)

    </div>
@endsection
