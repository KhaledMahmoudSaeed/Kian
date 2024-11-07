@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">@lang('messages.SHIPPER_DASHBOARD')</h1>

        {{-- Search Bar --}}
        <form action="{{ route('shipperdashboard.search') }}" method="GET" class="d-flex mb-4">
            <input type="search" id="gsearch" name="q" class="form-control me-2"
                placeholder="@lang('messages.SEARCH') @lang('messages.ID')" aria-label="@lang('messages.SEARCH')" value="{{ request('q') }}">
            <button type="submit" class="btn btn-primary">@lang('messages.SEARCH')</button>
        </form>
        @if (session('success'))
            <div id="message" class="alert alert-success">
                {{-- first I store the message from session in a variable then i pass it  to @lang directive  --}}
                @php
                    $word = session('success');
                @endphp
                @lang("messages.$word")
            </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">@lang('messages.BACK')</a>
        <a href="{{ route('shipperdashboard.create') }}" class="btn btn-success mb-3">@lang('messages.CREATE_SHIPER')</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-info">@lang('messages.ID')</th>
                    <th class="text-info">@lang('messages.NAME')</th>
                    <th class="text-info">@lang('messages.COUNTRY')</th>
                    <th class="text-info">@lang('messages.PHONE')</th>
                    <th class="text-info">@lang('messages.ACTIONS')</th>
                </tr>
            </thead>
            <tbody id="shipperTableBody" class="text-white">
                @foreach ($shiper as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->country }}</td>
                        <td>{{ $item->phone }}</td>

                        <td>
                            <a href="{{ route('shipperdashboard.show', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> <!-- Font Awesome icon for "View" -->
                            </a>
                            <a href="{{ route('shipperdashboard.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> <!-- Font Awesome icon for "Edit" -->
                            </a>
                            <form action="{{ route('shipperdashboard.destroy', $item->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('@lang('messages.CONFIRM_DELETE')')">
                                    <i class="fas fa-trash-alt"></i> <!-- Font Awesome icon for "Delete" -->
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@include('components.footer_basic')
