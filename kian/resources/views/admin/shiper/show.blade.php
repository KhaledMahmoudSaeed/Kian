@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">@lang('messages.SHIPPER_DETAILS')</h1>

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">@lang('messages.BACK')</a>

        <div id="message" class="alert d-none"></div>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th class="text-info">@lang('messages.SHIPPER_IMAGE')</th>
                    <th class="text-info">@lang('messages.SHIPPER_INFORMATION')</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        @if (isset($shiper->img) && $shiper->img !== null)
                            <img src="{{ asset('/shipers/img/' . $shiper->img) }}" alt="@lang('messages.SHIPPER_IMAGE')"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <p>@lang('messages.NO_IMAGE')</p>
                        @endif
                    </td>
                    <td>
                        <table class="table table-borderless text-light">
                            <tr>
                                <td><strong class="text-primary">@lang('messages.NAME'):</strong></td>
                                <td>{{ $shiper->name }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.COUNTRY'):</strong></td>
                                <td>{{ $shiper->country }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.PHONE'):</strong></td>
                                <td>{{ $shiper->phone }}</td>
                            </tr>

                            <tr>
                                <td><strong class="text-primary">@lang('messages.CREATED_AT'):</strong></td>
                                <td>{{ $shiper->created_at->format('D-M-Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong class="text-primary">@lang('messages.UPDATED_AT'):</strong></td>
                                <td>{{ $shiper->updated_at->format('D-M-Y') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@include('components.footer_basic')
