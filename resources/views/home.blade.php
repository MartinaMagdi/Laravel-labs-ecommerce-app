@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div>
                    @can('is-admin')
                    <h1 class="text-danger">Welcome Admin</h1>

                    @elsecan('is-user')
                    <h1 class="text-primary">Welcome User</h1>

                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
