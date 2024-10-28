@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">@lang('messages.PRODUCT_DASHBOARD')</h1>

        {{-- Search Bar --}}
        <form action="{{ route('productdashboard.search') }}" method="GET" class="d-flex mb-4">
            <input type="search" id="gsearch" name="q" class="form-control me-2"
                placeholder="@lang('messages.SEARCH') @lang('messages.ID')" aria-label="@lang('messages.SEARCH')" value="{{ request('q') }}">
            <button type="submit" class="btn btn-primary">@lang('messages.SEARCH')</button>
        </form>

        @if (session('success'))
            <div id="message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">@lang('messages.BACK')</a>
        <a href="{{ route('productdashboard.create') }}" class="btn btn-success mb-3">@lang('messages.CREATE_PRODUCT')</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-info">@lang('messages.ID')</th>
                    <th class="text-info">@lang('messages.NAME')</th>
                    <th class="text-info">@lang('messages.DESCRIPTION')</th>
                    <th class="text-info">@lang('messages.PRICE')</th>
                    <th class="text-info">@lang('messages.QUANTITY')</th>
                    <th class="text-info">@lang('messages.SALE')</th>
                    <th class="text-info">@lang('messages.SHIPPER')</th>
                    <th class="text-info">@lang('messages.ACTIONS')</th>
                </tr>
            </thead>
            <tbody id="productTableBody" class="text-white">
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->sale }}</td>
                        <td>{{ $item->shiper_id }}</td>
                        <td>
                            <a href="{{ route('productdashboard.show', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> <!-- Font Awesome icon for "View" -->
                            </a>
                            <a href="{{ route('productdashboard.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> <!-- Font Awesome icon for "Edit" -->
                            </a>
                            <form action="{{ route('productdashboard.destroy', $item->id) }}" method="POST"
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
