@extends('admin.layouts.app')

@section('content')
    <section>
        @include('sweetalert::alert')
        <div class="container-fluid pt-4 px-4">
            <div class="d-flex justify-content-between mb-4">
                <h3>Project Item</h3>
                <a href="{{ route('project-category.create') }}" class="btn btn-primary">+ Create</a>
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
                            @foreach ($project_cats as $project_cat)
                                <tr>
                                    <th>{{ $project_cat->id }}</th>
                                    <td>{{ $project_cat->name }}</td>
                                    <td>
                                        <form
                                            action="{{ route('project-category.destroy', ['project_category' => $project_cat->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('project-category.edit', ['project_category' => $project_cat->id]) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('project-category.destroy', ['project_category' => $project_cat->id]) }}"
                                                class="btn btn-primary" data-confirm-delete="true"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
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
