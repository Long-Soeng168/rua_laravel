@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Menu Pages')" />
        @livewire('menu-page-table-data')
    </div>
@endsection
