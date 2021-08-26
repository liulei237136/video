@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="">
                        <input type="text" name="search" class="form-control" placeholder="Search course">
                    </form>
                </div>

                @if($courses->count() !== 0)
                    <div class="card mt-5">
                        <div class="card-header">
                            Courses
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <th>Name</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>
                                            {{ $course->title }}
                                        </td>
                                        <td>
                                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">View Course</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row justify-content-center">
                                {{ $courses->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mt-5">
                        No courses found.
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
