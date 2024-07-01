@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Edit Project</h6>
                        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $project->name }}" placeholder="Name" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                                <input type="text" name="link" value="{{ $project->link }}" placeholder="Link" class="form-control" id="link">
                            </div>
                            <div class="row">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <div class="col-xl-2 col-md-4 col-12 h-100">
                                    <div class="position-relative">
                                        <label for="project_image">
                                            <img id="poster-image" src="{{ $project->img ? asset('storage/project/img/'.$project->img) : 'https://placehold.co/400x300' }}" height="330px" class="img-fluid shadow rounded">
                                        </label>
                                        <a class="text-white position-absolute top-0 start-25 translate-middle badge rounded-pill bg-danger poster_remove d-none">
                                            <i class="tf-icons bx bx-trash"></i>
                                        </a>
                                    </div>
                                    <input type="hidden" name="poster_base64" value="">
                                    <input type="file" name="project_image" accept="image/*" id="project_image" style="opacity: 0;">
                                </div>
                            </div>
                            <div class="modal" id="uploadposterModal" data-bs-backdrop="static">
                                <div class="modal-dialog" role="document" style="max-width: 500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div id="image_poster"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary crop_project_image">Crop and Save</button>
                                            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="mb-2">Select Items</h6>
                                <select class="form-select form-select-sm mb-3 js-example-basic-multiple" name="project_items[]" aria-label=".form-select-sm example" multiple="multiple">
                                    @foreach ($project_items as $item)
                                        <option value="{{ $item->id }}" {{ in_array($item->id, $project->items->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <h6 class="mb-2">Select Categories</h6>
                                <select class="form-select form-select-sm js-example-basic-multiple mb-3" name="project_cats[]" aria-label=".form-select-sm example" multiple="multiple">
                                    @foreach ($project_cats as $cat)
                                        <option value="{{ $cat->id }}" {{ in_array($cat->id, $project->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check py-2">
                                <label for="is_active" class="form-label">Active Status <span
                                        class="text-danger">*</span></label> <br>
                                <input name="is_active" class="form-lebel" type="radio" value="1" id="active"
                                    @if ($project->is_active == 1) checked required @endif />
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                                <br>
                                <input name="is_active" class="form-lebel" type="radio" value="0" id="in_active"
                                    @if ($project->is_active == 0) checked required @endif />
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        var el = document.getElementById('image_poster');
        $("#project_image").on("change", function(event) {
            $("#uploadposterModal").modal('show');
            croppie = new Croppie(el, {
                viewport: {
                    width: 400,
                    height: 300,
                    type: 'square'
                },
                boundary: {
                    width: 450,
                    height: 350
                }
            });
            getImage(event.target, croppie);
        });

        $(".close").click(function() {
            croppie.destroy();
        })

        function getImage(input, croppie) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    croppie.bind({
                        url: e.target.result,
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".crop_project_image").on("click", function() {
            croppie.result('base64').then(function(base64) {

                $("#uploadposterModal").modal("hide");

                $('.poster_remove').removeClass('d-none');

                $('#poster-image').attr('src', base64);

                $("input[name='poster_base64']").val(base64);

                croppie.destroy();
            });
        });

        $('.poster_remove').click(function() {
            $('#poster-image').attr('src', 'https://placehold.co/278x425');
            $('.poster_remove').addClass('d-none');
            $('#project_image').val('');
            $("input[name='poster_base64']").val('');
        })
    </script>
@endsection
