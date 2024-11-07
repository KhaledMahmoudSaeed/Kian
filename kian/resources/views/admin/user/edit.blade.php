@extends('layouts.app')

@section('content')
    @include('components.navbar_basic')
    <span></span><br>
    <div class="min-h-screen bg-gray-900 py-5">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto">
                <h1 class="text-center text-white">@lang('messages.EDIT_PROFILE')</h1>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">@lang('messages.BACK')</a>

                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-md">
                    <div class="bg-gray-800 p-4 rounded-b-lg">
                        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="block text-gray-300">@lang('messages.NAME')</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror bg-dark text-white"
                                    name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>
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
                                    name="email" value="{{ old('email', $user->email) }}" autocomplete="email">
                                @error('email')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="block text-gray-300">@lang('messages.PHONE')</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
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
                                @if ($user->img)
                                    <div class="mt-2">
                                        <img src="{{ asset('users/img/' . $user->img) }}"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>

                            <div class="mb-6">
                                <label for="country" class="block text-gray-300">@lang('messages.COUNTRY')</label>
                                <select name="country" id="country"
                                    class="form-control @error('country') is-invalid @enderror bg-dark text-white">
                                    <option value="">@lang('messages.SELECT_COUNTRY')</option>
                                    @foreach (['UNITED_STATES', 'CANADA', 'UNITED_KINGDOM', 'FRANCE', 'GERMANY', 'ITALY', 'SPAIN', 'AUSTRALIA', 'INDIA', 'JAPAN', 'BRAZIL', 'MEXICO', 'CHINA', 'SOUTH_AFRICA', 'RUSSIA'] as $countryKey)
                                        <option value="{{ str_replace('_', ' ', strtolower($countryKey)) }}"
                                            {{ old('country', strtolower($user->country)) === strtolower($countryKey) ? 'selected' : '' }}>
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
                                    @lang('messages.UPDATE')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
