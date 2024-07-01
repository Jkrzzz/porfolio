@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4 ">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Project / Project Item</h6>
                        <form action="{{ route('project-item.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
                                <input type="color" name="color" placeholder="Color" id="color">
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
