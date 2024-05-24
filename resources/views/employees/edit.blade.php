@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nik:</label>
            <input type="text" name="nik" class="form-control" value="{{ $employee->nik }}" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" name="department" class="form-control" value="{{ $employee->department }}" required>
        </div>
        <div class="form-group">
            <label for="date_of_hire">Date of Hire:</label>
            <input type="date" name="date_of_hire" class="form-control" value="{{ $employee->date_of_hire }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
