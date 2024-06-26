@extends('templates.base')

@section('title', 'EpiFlix! - Profile')

@section('content')

<div class="container mt-4 mb-3">
    <div class="row">
        <div class="card col-10 mx-auto my-3">
                <h5 class="card-title my-2">Profile Information</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Update your account's profile information and email address.</h6>
                <div class="card-body">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}" required>
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <div class="alert alert-warning" role="alert">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </div>

                        @if (session('status') === 'verification-link-sent')
                            <div class="alert alert-success" role="alert">
                            {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>  
        </div>

        <div class="card col-10 mx-auto my-3">
            <h5 class="card-title my-2">Update Password</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Ensure your account is using a long, random password to stay secure.</h6>
            <div class="card-body">
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 needs-validation">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="update_password_current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="update_password_current_password" name="current_password" required>
                            {{-- <div class="invalid-feedback">
                            {{$errors->updatePassword->get('current_password')}}
                            </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="update_password_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="update_password_password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="update_password_password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="d-flex flex-row">
                        <button type="submit" class="btn btn-primary">Save</button>
                        @if (session('status') === 'password-updated')
                            <div
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="alert alert-success mt-2" role="alert"
                            >{{ __('Saved.') }}</div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-10">
                </div>
            </div>
        </div>
    </div>
</div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
