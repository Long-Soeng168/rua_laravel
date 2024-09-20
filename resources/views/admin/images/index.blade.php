@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Galleries')" />
        @livewire('image-table-data')
    </div>
@endsection
