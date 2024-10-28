@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">@lang('messages.CREATE_PRODUCT')</h1>

        <a href="/productdashboard" class="btn btn-secondary mb-3">@lang('messages.BACK_TO_DASHBOARD')</a>

        <div id="message" class="alert d-none"></div>

        <form id="createProductForm" action="{{ route('productdashboard.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label text-white">@lang('messages.PRODUCT_NAME')</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="productName" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label text-white">@lang('messages.DESCRIPTION')</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="productDescription">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label text-white">@lang('messages.PRICE')</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                    id="productPrice" value="{{ old('price') }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label text-white">@lang('messages.QUANTITY')</label>
                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                    id="productQuantity" value="{{ old('quantity') }}">
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productSale" class="form-label text-white">@lang('messages.SALE') (%)</label>
                <input type="number" name="sale" class="form-control @error('sale') is-invalid @enderror"
                    id="productSale" value="{{ old('sale') }}">
                @error('sale')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label text-white">@lang('messages.PRODUCT_IMAGE')</label>
                <input type="file" name="img" class="form-control @error('img') is-invalid @enderror"
                    id="productImage">
                @error('img')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="shiperId" class="form-label text-white">@lang('messages.SHIPPER_ID')</label>
                <input type="text" name="shiper_id" class="form-control @error('shiper_id') is-invalid @enderror"
                    id="shiperId" value="{{ old('shiper_id') }}">
                @error('shiper_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">@lang('messages.CREATE_PRODUCT')</button>
        </form>
    </div>
@endsection
@include('components.footer_basic')
