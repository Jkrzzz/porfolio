@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">
            <div class="d-flex justify-content-between mb-4">
                <h3>Project</h3>
                <a href="{{ route('project.create') }}" class="btn btn-primary">+ Create</a>
            </div>
            <div class="row g-4 ">
                <div class="bg-secondary rounded p-5">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th>{{ $project->id }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>
                                        <form action="{{ route('project.destroy', ['project' => $project->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('project.edit', ['project' => $project->id]) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <button type="submit" class="btn btn-primary"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable(

            );
        });
    </script>
@endsection
