@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">@lang('messages.EDIT_SHIPPER')</h1>

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">@lang('messages.BACK_TO_DASHBOARD')</a>

        <div id="message" class="alert d-none"></div>

        <form id="editshiperForm" action="{{ route('shipperdashboard.update', $shiper->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="ShipperName" class="form-label text-white">@lang('messages.SHIPPER_NAME')</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="ShipperName" value="{{ old('name', $shiper->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="shippercountry" class="form-label text-white">@lang('messages.SHIPPER_COUNTRY')</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                    id="shippercountry" value="{{ old('country', $shiper->country) }}">{{ old('country') }}</input>
                @error('country')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="shipperphone" class="form-label text-white">@lang('messages.PHONE')</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    id="shipperphone" value="{{ old('phone', $shiper->phone) }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="shipperImage" class="form-label text-white">@lang('messages.SHIPPER_IMAGE')</label>
                <input type="file" name="img" class="form-control @error('img') is-invalid @enderror"
                    id="shipperImage">
                @error('img')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if ($shiper->img)
                    <div class="mt-2">
                        <img src="{{ asset('shipers/img/' . $shiper->img) }}" alt="@lang('messages.CURRENT_SHIPPER_IMAGE')"
                            style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">@lang('messages.UPDATE_SHIPPER')</button>
        </form>
    </div>
@endsection
@include('components.footer_basic')