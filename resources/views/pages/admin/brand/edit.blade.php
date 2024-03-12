@extends('layouts.admin_layout')
@section('content')
    @livewire('pages.brand.edit', ['brandId' => $brandId])
    
@endsection
