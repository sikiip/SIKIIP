@extends('layouts.app')

@section('content')
            <div id="bg-image" class="login">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        {{ csrf_field() }}

                        <div>
                            <img src="/image/logo.png"><br>
                            <h2 class="text-ubahpassword">Reset Password</h2>
                        </div>


                        <input type="hidden" name="token" value="{{ $token }}">

                        <div>
                            <div >
                                <input id="email" type="email" class="username" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div>
                            <div>
                                <input id="password" type="password" class="password" placeholder="Password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <input id="password-confirm" type="password" class="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div>
                            <div>
                                <button type="submit" class="button">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
