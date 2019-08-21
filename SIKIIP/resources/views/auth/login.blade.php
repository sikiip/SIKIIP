@extends('layouts.app')

@section('content')

            <!-- Form Login-->
                 <div id="bg-image" class="login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <img src="/image/logo.png"><br><br>
                        </div>
                        <div >
                            <!-- Email -->
                            <div>
                                <!-- Notifikasi Error -->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="email" type="email" class="username" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div >
                            <!-- Password -->
                            <div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="password" type="password" class="password" placeholder="Password" name="password" required autocomplete="current-password">
                            </div>
                        </div>
                            <!-- Button Submit -->
                        <div >
                            <div >
                                <button type="submit" class="button">
                                    {{ __('Login') }}
                                </button>
                            <!-- Lupa Password -->
                                @if (Route::has('password.request'))
                                <div class="lupaPass">
                                    <a id="lupaPass" href="{{ route('password.request') }}">
                                        {{ __('Lupa Kata Sandi?') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
@endsection
