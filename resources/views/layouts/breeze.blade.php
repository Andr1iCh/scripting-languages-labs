@extends('layouts.app')
@section('title', isset($header) ? trim(strip_tags((string) $header)) : 'Обліковий запис')
@section('main-class', 'account-main')

@section('content')
    @isset($header)
        <header>{{ $header }}</header>
    @endisset

    {{ $slot }}
@endsection
