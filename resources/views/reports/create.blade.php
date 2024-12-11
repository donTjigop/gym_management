@extends('layouts.app')

@section('title', 'Generate Transaction Report')

@section('content')
    <div class="main-content">
        <h1>Generate Transaction Report</h1>

        <!-- Report form -->
        <form action="{{ route('reports.generate') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Transaction Status</label>
                <select name="status" class="form-control">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                </select>
            </div>

            <div class="form-group">
                <label for="member_id">Member</label>
                <select name="member_id" class="form-control">
                    <option value="">All</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>
    </div>
@endsection
