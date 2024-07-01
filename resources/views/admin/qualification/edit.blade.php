@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4 ">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Qualification</h6>
                        <form action="{{ route('qualification.update', ['qualification' => $qualification->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $qualification->name }}" name="name" placeholder="name"
                                    class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $qualification->position }}" name="position"
                                    placeholder="Position" class="form-control" id="position">
                            </div>
                            <h6 class="mb-2">Select Type</h6>
                            <select class="form-select form-select-sm mb-3" name="type"
                                aria-label=".form-select-sm example">
                                <option {{ $qualification->type === 'Education' ? 'selected' : '' }} value="Education">
                                    Education</option>
                                <option {{ $qualification->type === 'Experience' ? 'selected' : '' }} value="Experience">
                                    Experience</option>
                            </select>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date <span
                                        class="text-danger">*</span></label> <br>
                                <input type="date" value="{{ $qualification->start_date }}" name="start_date"
                                    class="form-start_date" id="start_date">
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">End Date </label><br>
                                <input type="date" value="{{ $qualification->end_date }}" name="end_date"
                                    class="form-start_date" id="end_date">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
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
