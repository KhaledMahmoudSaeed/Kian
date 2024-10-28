@extends('layouts.app')

@section('content')
    @include('components.navbar_basic')
    <span></span><br>
    <div class="min-h-screen bg-gray-900 py-5">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto">
                <h1 class="text-center text-white">@lang('messages.REGISTER')</h1>
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-md">

                    <div class="bg-gray-800 p-4 rounded-b-lg">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-gray-300">@lang('messages.NAME')</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror bg-dark text-white"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-300">@lang('messages.EMAIL')</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror bg-dark text-white"
                                    name="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-300">@lang('messages.PASSWORD')</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror bg-dark text-white"
                                    name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="block text-gray-300">@lang('messages.CONFIRM_PASSWORD')</label>
                                <input id="password-confirm" type="password" class="form-control bg-dark text-white"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-300">@lang('messages.GENDER')</label>
                                <br>
                                <input class="form-check-input ml-1 @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" id="male" value="male"
                                    {{ old('gender') === 'male' ? 'checked' : '' }}>
                                <label class="form-check-label text-gray-300 ml-4" for="male">@lang('messages.MALE')</label>

                                <input class="form-check-input ml-2 @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" id="female" value="female"
                                    {{ old('gender') === 'female' ? 'checked' : '' }}>
                                <label class="form-check-label text-gray-300 ml-4" for="female">@lang('messages.FEMALE')</label>

                                @error('gender')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="block text-gray-300">@lang('messages.PHONE')</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="form-control @error('phone') is-invalid @enderror bg-dark text-white">
                                @error('phone')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="img" class="block text-gray-300">@lang('messages.PROFILE_PICTURE')</label>
                                <input type="file"
                                    class="form-control @error('img') is-invalid @enderror bg-dark text-white"
                                    id="img" name="img">
                                @error('img')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="country" class="block text-gray-300">@lang('messages.COUNTRY')</label>
                                <select name="country" id="country"
                                    class="form-control @error('country') is-invalid @enderror bg-dark text-white">
                                    <option value="">@lang('messages.SELECT_COUNTRY')</option>
                                    @foreach (['UNITED_STATES', 'CANADA', 'UNITED_KINGDOM', 'FRANCE', 'GERMANY', 'ITALY', 'SPAIN', 'AUSTRALIA', 'INDIA', 'JAPAN', 'BRAZIL', 'MEXICO', 'CHINA', 'SOUTH_AFRICA', 'RUSSIA'] as $countryKey)
                                        <option value="{{ str_replace('_', ' ', strtolower($countryKey)) }}"
                                            {{ old('country') === strtolower($countryKey) ? 'selected' : '' }}>
                                            @lang("messages.$countryKey")
                                        </option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <br>
                            <div class="mb-0">
                                <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-500">
                                    @lang('messages.REGISTER')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
