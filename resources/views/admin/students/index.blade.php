@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Homepage Links')" />
        @livewire('student-table-data')
    </div>
@endsection
