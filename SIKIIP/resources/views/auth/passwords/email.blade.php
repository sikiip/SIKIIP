@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    <div id="bg-image" class="login">

                    <div class="img-logo">
                        <img src="/image/logo.png"><br>
                    </div>

                    <div class="alert alert-warning" role="alert">
                        <p>Cek pada bagian spam email Anda apabila tidak ada balasan email oleh system di inbox email Anda!</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div>
                                <input id="email" type="email" class="username" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>
                                 
                        <div >
                            <div>
                                <button type="submit" class="button">
                                    {{ __('Kirim email ubah password') }}
                                </button>
                                <a href="/login"><button type="button" class="button-backtologin">
                                    Login
                                </button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
