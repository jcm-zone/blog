@extends('layouts.admin')
@section('title', 'Student List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('student.create') }}" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i>Add New </a>
                </div>
            </div>

            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <th>@sortablelink('first_name','Name')</th>
                    <th>@sortablelink('dob')</th>
                    <th>@sortablelink('gender')</th>
                    <th>@sortablelink('email')</th>
                    <th>@sortablelink('phone')</th>
                    <th>@sortablelink('address')</th>
                    <th>@sortablelink('zipcode')</th>
                    <th> Action </th>
                </thead>
         
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td> {{ $student->first_name }} {{ $student->last_name }} </td>
                        <td> {{ $student->dob }} </td>
                        <td> {{ $student->gender }} </td>
                        <td> {{ $student->email }} </td>
                        <td> {{ $student->phone }} </td>
                        <td> {{ $student->address }} </td>
                        <td> {{ $student->zipcode }} </td>
                        <td>
                            <a href="{{ route('student.show', $student->id )}}" class="badge badge-info"> View </a>
                            <a href="{{ route('student.edit', $student->id )}}" class="badge badge-success"> Edit </a>
                            <form action="{{ route('student.destroy', $student->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="badge btn-danger" type="submit"> Delete </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <!-- {!! $students->links() !!} -->
            {!! $students->appends(Request::all())->links() !!}

        </div>
    </div>
</div>
@endsection
