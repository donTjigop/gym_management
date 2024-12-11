@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="main-content">
        <h1>Gym Management Settings</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="app_name">Application Name</label>
                <input type="text" name="app_name" id="app_name" class="form-control"
                       value="{{ $settings['app_name'] ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="app_logo">Application Logo URL</label>
                <input type="text" name="app_logo" id="app_logo" class="form-control"
                       value="{{ $settings['app_logo'] ?? '' }}">
            </div>

            <div class="form-group">
                <label for="gym_address">Gym Address</label>
                <textarea name="gym_address" id="gym_address" class="form-control" rows="3">{{ $settings['gym_address'] ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" class="form-control"
                       value="{{ $settings['contact_email'] ?? '' }}">
            </div>

            <div class="form-group">
                <label for="contact_phone">Contact Phone</label>
                <input type="text" name="contact_phone" id="contact_phone" class="form-control"
                       value="{{ $settings['contact_phone'] ?? '' }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
@endsection
