@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('News')" />
        @livewire('news-table-data')
    </div>
@endsection
