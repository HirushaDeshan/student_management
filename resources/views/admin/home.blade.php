@php
    $id = session('id');
    $role = session('role');
@endphp

@if (!empty($id))
    @if (\Illuminate\Support\Facades\Auth::id() == $id && $role == 'instructor')
        @extends('layouts.master')
        @section('content')
            <h1 class="text-center">Admin Dashboard</h1>

            <div class="container my-3">
                @if (session()->has('message'))
                    <div class="col-md-4">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @foreach ($errors->all() as $error)
                    <div class="col-md-4">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endforeach
            </div>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Cource
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Cource</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ url('/addCourse') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <input type="text" name="instructorId" value="{{ $id }}" class="form-control"
                                    hidden>

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputAddress">
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword4" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered my-5" id="coursesTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Lesson Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                @if ($courses)
                    @foreach ($courses as $course)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td>{{ $course->title }} </td>
                                <td>{{ $course->category }} </td>
                                <td>{{ $course->description }} </td>
                                {{-- <td>{{ $course->title }} </td> --}}
                                <td>ttt</td>
                                <td>{{ $course->id }}
                                    <button data-bs-toggle="modal" data-bs-target="#testModal"
                                        data-id="{{ $course->id }}" class="btn btn-success">
                                        Add Lessons
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                @else
                    <p class="text-center">no data preview</p>
                @endif
            </table>


            {{-- add lessons modal --}}
            <div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="myModalLabel">Add Lessons</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ url('/addLessons') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <input type="text" name="courseId" id="courseId" class="form-control" hidden>

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputAddress">
                                </div>

                                <div class="col-12">
                                    <label for="inputPassword4" class="form-label">Content</label>
                                    <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                $('#testModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');

                    console.log("ID:", id);
                    var modal = $(this);
                    modal.find('.modal-body #courseId').val(id);
                });
            </script>
        @endsection

    @endif
@endif
