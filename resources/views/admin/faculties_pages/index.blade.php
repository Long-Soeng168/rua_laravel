@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Faculty Pages')" />
        @livewire('faculty-page-table-data')
    </div>
@endsection
