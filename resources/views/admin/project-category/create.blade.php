@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4 ">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Project / Project Category</h6>
                        <form action="{{ route('project-category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="name" class="form-control" id="name">
                            </div>
                            <div class="form-check py-2">
                                <label for="is_active" class="form-label">Active Status <span
                                        class="text-danger">*</span></label>
                                <br>
                                <input name="is_active" class="form-lebel" type="radio" value="1" id="active"
                                    checked />
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                                <br>
                                <input name="is_active" class="form-lebel" type="radio" value="0" id="in_active" />
                                <label class="form-check-label" for="in_active">
                                    In Active
                                </label>
                                <br>
                                @error('is_active')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
