@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">@lang('messages.PRODUCT_DETAILS')</h1>

        <a href="/productdashboard" class="btn btn-secondary mb-3">@lang('messages.BACK')</a>

        <div id="message" class="alert d-none"></div>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th class="text-info">@lang('messages.PRODUCT_IMAGE')</th>
                    <th class="text-info">@lang('messages.PRODUCT_INFORMATION')</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        @if (isset($product->img) && $product->img !== null)
                            <img src="{{ asset('/products/img/' . $product->img) }}" alt="@lang('messages.PRODUCT_IMAGE')"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <p>@lang('messages.NO_IMAGE')</p>
                        @endif
                    </td>
                    <td>
                        <table class="table table-borderless text-light">
                            <tr>
                                <td><strong class="text-primary">@lang('messages.DESCRIPTION'):</strong></td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.PRICE'):</strong></td>
                                <td>${{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.QUANTITY'):</strong></td>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.SALE'):</strong></td>
                                <td>%{{ $product->sale }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.SHIPPER'):</strong></td>
                                <td>{{ $product->shiper_id }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.CREATED_AT'):</strong></td>
                                <td>{{ $product->created_at->format('D-M-Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.UPDATED_AT'):</strong></td>
                                <td>{{ $product->updated_at->format('D-M-Y') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@include('components.footer_basic')
