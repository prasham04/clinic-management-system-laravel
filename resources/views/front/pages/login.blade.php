@extends('front.inc.master')

@section('title')
Login
@endsection

@section('content')

    <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
        <form class="form">

            <div class="mb-3">
                <label class="form-label required-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label required-label" for="password">password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
            <span>don't have an account?</span><a class="link" href="./register.html">create account</a>
        </div>
    </div>

@endsection