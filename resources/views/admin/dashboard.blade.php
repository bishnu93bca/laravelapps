@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white border-0 pt-4">
                    <h3 class="fw-bold">Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-light border" role="alert">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="currentColor">
                                    <use xlink:href="#info-fill"/>
                                </svg>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="alert-heading">Welcome back, {{ Auth::user()->name }}!</h5>
                                <p>You're logged in to your account.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        <div class="p-4 bg-light border rounded">
                            <h5 class="fw-semibold">Account Information</h5>
                            <div class="mt-3">
                                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <p><strong>Account Created:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100 py-2">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection