@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Side Info')" />
        @livewire('lecturer-table-data')
    </div>
@endsection
