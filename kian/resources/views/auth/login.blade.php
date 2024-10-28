@extends('layouts.app')

@section('content')
    @include('components.navbar_basic')
    <span></span><br>
    <div class="min-h-screen bg-gray-900 py-5">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto">
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-md">
                    <div class="bg-gray-900 text-white text-lg font-semibold p-4 rounded-t-lg">@lang('messages.LOGIN')</div>

                    <div class="bg-gray-800 p-4 rounded-b-lg">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="block text-gray-300">@lang('messages.EMAIL_ADDRESS')</label>
                                <input id="email" type="email"
                                    class="text-dark form-control @error('email') is-invalid @enderror bg-gray-700 text-white"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-300">@lang('messages.PASSWORD')</label>
                                <input id="password" type="password"
                                    class="text-dark form-control @error('password') is-invalid @enderror bg-gray-700 text-white"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input class="form-check-input ml-2" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-gray-300 ml-4" for="remember">
                                        @lang('messages.REMEMBER_ME')
                                    </label>
                                </div>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="bg-primary text-white px-5 py-2 rounded hover:bg-blue-500">
                                    @lang('messages.LOGIN')
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-gray-300 hover:text-blue-500"
                                        href="{{ route('password.request') }}">
                                        @lang('messages.FORGOT_YOUR_PASSWORD')
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
