@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Faculties')" />
        @livewire('faculty-table-data')
    </div>
@endsection
