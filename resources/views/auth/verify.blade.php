@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-20 text-center">
    <div class="text-2xl my-5">{{ __('Verify Your Email Address') }}</div>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <p class="mt-4">{{ __('If you did not receive the email') }}</p>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="mt-10 mx-w-sm bg-gray-500 hover:bg-gray-900 
            text-gray-100 p-3 focus:outline-none font-bold uppercase"
            >{{ __('click here to request another') }}</button>
        </form>
</div>
@endsection
