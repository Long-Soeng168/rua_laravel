@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Scholarships')" />
        @livewire('journal-table-data')
    </div>
@endsection
