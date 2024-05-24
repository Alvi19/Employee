<!-- resources/views/employees/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="text-center">Employee Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title font-bold">{{ $employee->name }}</h5>
            <p class="card-text">Position: {{ $employee->position }}</p>
            <p class="card-text">Department: {{ $employee->department }}</p>
            <p class="card-text">Date of Hire: {{ $employee->date_of_hire }}</p>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
