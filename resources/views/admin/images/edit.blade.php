@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Gallery')" class="p-4" />

        @livewire('image-edit', ['id' => $id])

    </div>
@endsection
