@extends('layouts.main_layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5">

                    <!-- logo -->
                    <div class="text-center p-3">
                        <img src="assets/images/logo.png" alt="Notes logo">
                    </div>

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="/loginSubmit" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="email" class="form-control bg-dark text-info" name="username" value="{{old('username')}}">
                                    {{-- show error --}}
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control bg-dark text-info" name="password" value="{{old('password')}}">
                                    @error(' ')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- erro login --}}
                    @if (session('loginError'))
                        <div class="alert alert-danger mt-3">
                            {{ session('loginError') }}
                        </div>
                    @endif

                    <!-- copy -->
                    <div class="text-center text-secondary mt-3">
                        <small>&copy; <?= date('Y') ?> Developed By RaySystems</small>
                    </div>
                    {{-- erros --}}
                    {{--
                    @if ($errors->any())

                    <div class="alert alert-danger mt-3">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    @endif
                    --}}
                </div>
            </div>
        </div>
    </div>

@endsection
