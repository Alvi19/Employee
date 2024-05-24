@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nik">Nik:</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" name="department" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_of_hire">Date of Hire:</label>
            <input type="date" name="date_of_hire" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>

    </form>
@endsection
