@extends('layouts.app')
@include('components.navbar_basic')

@section('content')
    <div class="container">
        <h1 class="text-center text-info my-4">@lang('messages.MESSAGE_DASHBOARD')</h1>


        @if (session('success'))
            <div id="message" class="alert alert-success">
                {{-- {{ session('success') }} --}}
                @php
                    $word = session('success');
                @endphp
                @lang("messages.$word")
            </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">@lang('messages.BACK')</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-info">@lang('messages.ID')</th>
                    <th class="text-info">@lang('messages.NAME')</th>
                    <th class="text-info">@lang('messages.EMAIL')</th>
                    <th class="text-info">@lang('messages.SUBJECT')</th>
                    <th class="text-info">@lang('messages.MESSAGE')</th>
                    <th class="text-info">@lang('messages.CREATED_AT')</th>
                    <th class="text-info">@lang('messages.ACTIONS')</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @foreach ($messages as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ date_format($item->created_at, 'd-M-Y') }}</td>

                        <td>

                            <form action="{{ route('messagedashboard.destroy', $item->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('@lang('messages.CONFIRM_DELETE')')">
                                    <i class="fas fa-trash-alt"></i> <!-- Font Awesome icon for "Delete" -->
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@include('components.footer_basic')
