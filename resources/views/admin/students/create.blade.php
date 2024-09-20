@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Homepage Link')" class="p-4" />

        @livewire('student-create')

    </div>
@endsection
