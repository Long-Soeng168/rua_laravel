@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Faculty')" class="p-4" />

        @livewire('faculty-page-edit', [
            'id' => $id
        ])

    </div>
@endsection
