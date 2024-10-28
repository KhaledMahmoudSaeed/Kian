@extends('layouts.app')

@section('content')
    @include('components.navbar_basic')

    <div class="container">

        <div class="d-flex flex-column align-items-center">
            <h1 class="text-center text-primary my-4">@lang('messages.USER_DETAILS')</h1>
            <img src="{{ asset('/users/img/' . $user->img) }}" alt="User Image" class="rounded-circle mb-3"
                style="width: 150px; height: 150px; object-fit: cover;">
        </div>

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
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">@lang('messages.BACK')</a>
    @if (Auth::user()->id === $user->id)
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning mt-3">@lang('messages.EDIT')</a>
    @endif
@endsection
