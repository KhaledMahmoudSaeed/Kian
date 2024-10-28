@extends('layouts.app')

@section('content')
    @include('components.navbar_basic')

    <div class="container">

        <div class="d-flex flex-column align-items-center">
            <h1 class="text-center text-primary my-4">@lang('messages.USER_DETAILS')</h1>
            <img src="{{ asset('/users/img/' . $user->img) }}" alt="User Image" class="rounded-circle mb-3"
                style="width: 150px; height: 150px; object-fit: cover;">
        </div>

        <!-- Message alert for any errors or success -->
        <div id="message" class="alert alert-primary d-none"></div>

        <!-- User Details Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="text-primary">@lang('messages.ID')</th>
                        <td class="text-white">{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">@lang('messages.NAME')</th>
                        <td class="text-white">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">@lang('messages.EMAIL')</th>
                        <td class="text-white">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">@lang('messages.GENDER')</th>
                        <td class="text-white">{{ $user->gender }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">@lang('messages.COUNTRY')</th>
                        <td class="text-white">{{ $user->country }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">@lang('messages.PHONE')</th>
                        <td class="text-white">{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">@lang('messages.ROLE')</th>
                        <td class="text-white">{{ $user->role }}</td>
                    </tr>

                    
                    <tr>
                        <th class="text-primary">@lang('messages.HE_BUYS')</th>
                        <td class="text-white">
                            <div class="container">
                                <h5 class="text-light mb-3">@lang('messages.TOTAL_PRODUCT'): <span
                                        class="text-success">{{ $user->products->count() }}</span></h5>
                                <div class="row">
                                    @foreach ($user->products as $product)
                                        <div class="col-md-4 mb-3">
                                            <div class="card bg-dark text-white">
                                                <div class="card-body p-2">
                                                    <h6 class="card-title mb-1">{{ $product->name }}</h6>
                                                    <p class="card-text mb-1">@lang('messages.PRICE'): <strong
                                                            class="text-success">{{ $product->price }}</strong></p>
                                                    <p class="card-text mb-1">@lang('messages.SALE'): <strong
                                                            class="text-danger">{{ $product->sale }}</strong></p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">@lang('messages.BACK')</a>
@endsection
