@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4 ">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Qualification</h6>
                        <form action="{{ route('qualification.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="name" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                                <input type="text" name="position" placeholder="Position" class="form-control"
                                    id="position">
                            </div>
                            <h6 class="mb-2">Select Type</h6>
                            <select class="form-select form-select-sm mb-3" name="type"
                                aria-label=".form-select-sm example">
                                <option value="Education">Education</option>
                                <option value="Experience">Experience</option>
                            </select>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date <span
                                        class="text-danger">*</span></label> <br>
                                <input type="date" name="start_date" class="form-start_date" id="start_date">
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">End Date </label><br>
                                <input type="date" name="end_date" class="form-start_date" id="end_date">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    </script>
@endsection
