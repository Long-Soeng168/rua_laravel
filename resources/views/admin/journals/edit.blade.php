@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Scholarship')" class="p-4" />

        @livewire('journal-edit', ['id' => $id])

    </div>
@endsection
