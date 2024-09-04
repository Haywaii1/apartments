@extends('layouts.app')
@section('title', 'Email Verification')
@section('content')

<div class="card">
    <div class="card-header">
      X-factor
    </div>
    <div class="card-body">
      <h5 class="card-title">Email Verification</h5>
      <p class="card-text">Welcome, please check your emeil click the verification link.</p>
      <a href="{{ route('verification.resend') }}" class="btn btn-primary">Resesnd Verification</a>
    </div>
  </div>

@endsection
