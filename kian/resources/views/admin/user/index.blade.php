@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">

        <h1 class="text-center text-info my-4">@lang('messages.USER_DASHBOARD')</h1>

        {{-- Display Session Messages --}}
        @if (session('success'))
            <div id="message" class="alert alert-success">
                {{-- {{ session('success') }} --}}
                @php
                    $word = session('success');
                @endphp
                @lang("messages.$word")
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Search Bar --}}
        <form action="{{ route('userdashboard.search') }}" method="GET" class="d-flex mb-4">
            <input type="search" id="gsearch" name="q" class="form-control me-2"
                placeholder="@lang('messages.SEARCH') @lang('messages.ID')" aria-label="Search" value="{{ request('q') }}">
            <button type="submit" class="btn btn-primary">@lang('messages.SEARCH')</button>
        </form>

        <a href="/userdashboard" class="btn btn-secondary mb-3">@lang('messages.BACK')</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-info">@lang('messages.ID')</th>
                    <th class="text-info">@lang('messages.NAME')</th>
                    <th class="text-info">@lang('messages.EMAIL')</th>
                    <th class="text-info">@lang('messages.GENDER')</th>
                    <th class="text-info">@lang('messages.COUNTRY')</th>
                    <th class="text-info">@lang('messages.PHONE')</th>
                    <th class="text-info">@lang('messages.ROLE')</th>
                    <th class="text-info">@lang('messages.ACTIONS')</th>
                </tr>
            </thead>
            <tbody id="userTableBody" class="text-white">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}

                            @if ($user->role === 'user')
                                <form action="{{ route('promote', $user->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <input type="submit" value="Promote" class="btn btn-success">
                                </form>
                            @elseif ($user->role === 'admin' && $user->id !== Auth::user()->id && $user->id !== 52)
                                <form action="{{ route('demote', $user->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <input type="submit" value="Demote" class="btn btn-warning">
                                </form>
                            @endif

                        </td>
                        <td>
                            <a href="{{ route('userdashboard.show', $user->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if ($user->id !== Auth::user()->id && $user->id !== 52)
                                <form action="{{ route('userdashboard.destroy', $user->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('@lang('messages.CONFIRM_DELETE')')">
                                        <i class="fas fa-trash-alt"></i> <!-- Font Awesome icon for "Delete" -->
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@include('components.footer_basic')
