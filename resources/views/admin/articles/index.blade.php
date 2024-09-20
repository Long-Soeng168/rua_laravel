@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Procurements')" />
        @livewire('article-table-data')
    </div>
@endsection
