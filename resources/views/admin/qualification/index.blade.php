@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">
            <div class="d-flex justify-content-between mb-4">
                <h3>Qualification</h3>
                <a href="{{ route('qualification.create') }}" class="btn btn-primary">+ Create</a>
            </div>
            <div class="row g-4 ">
                <div class="bg-secondary rounded p-5">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($qualifications as $qualification)
                                <tr>
                                    <th>{{ $qualification->id }}</th>
                                    <td>{{ $qualification->name }}</td>
                                    <td>
                                        {{ $qualification->position }}
                                    </td>
                                    <td>{{ $qualification->start_date }}</td>
                                    <td>{{ $qualification->end_date }}</td>
                                    <td>
                                        <form
                                            action="{{ route('qualification.destroy', ['qualification' => $qualification->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('qualification.edit', ['qualification' => $qualification->id]) }}"
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
