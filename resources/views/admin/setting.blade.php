@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <form id="settingForm" action="{{ route('admin.post-setting') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center my-3">
                                <h6>Setting</h6>
                                <div>
                                    <button id="editBtn" class="btn btn-primary">Edit</button>
                                    <button id="saveBtn" class="btn btn-primary me-2 d-none">Save</button>
                                    <button id="cancelBtn" class="btn btn-danger d-none">Cancel</button>

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" disabled value="{{ $setting->name }}" name="name"
                                    class="form-control" id="name">
                            </div>
                            <div class="row">
                                <label for="poster_image" class="form-label">Profile Image</label>

                                <div class="col-xl-2 col-md-4 col-12 h-100">
                                    <div class="position-relative">
                                        <label for="poster_image">
                                            @if ($setting->photo)
                                                <img id="poster-image" src="{{ asset('img/' . $setting->photo) }}"
                                                    height="330px" class="img-fluid shadow rounded">
                                            @else
                                                <img id="poster-image" src="https://placehold.co/550x550" height="330px"
                                                    class="img-fluid shadow rounded">
                                            @endif
                                        </label>
                                        <a
                                            class="text-white position-absolute top-0 start-25 translate-middle badge rounded-pill bg-danger poster_remove d-none">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                    <input type="hidden" name="poster_base64" value="">
                                    <input type="file" name="poster_image" accept="image/*" id="poster_image" disabled
                                        style="opacity: 0;">
                                </div>
                            </div>

                            <div class="modal" id="uploadposterModal" data-bs-backdrop="static">
                                <div class="modal-dialog" role="document" style="max-width: 700px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="btn-close close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div id="image_poster"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary crop_poster_image">Crop and
                                                Save</button>
                                            <button type="button" class="close btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="position_array" class="form-label me-4">Positions</label>
                                <input type="text" class="form-control" disabled value="{{ $setting->position_array }}"
                                    name="position_array" id="position_array">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" disabled class="form-control" id="description" cols="10" rows="5">{{ $setting->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="experience_year" class="form-label me-4">Experience Year</label>
                                <input type="date" disabled value="{{ $setting->experience_year }}"
                                    name="experience_year" id="experience_year">
                            </div>
                            <div class="mb-3">
                                <label for="completed_projects" class="form-label">Completed Projects</label>
                                <input type="number" disabled value="{{ $setting->completed_projects }}"
                                    name="completed_projects" class="form-control" id="completed_projects">
                            </div>
                            <div class="mb-3">
                                <label for="about_description" class="form-label">About Description</label>
                                <textarea name="about_description" disabled class="form-control" id="about_description" cols="10"
                                    rows="5">{{ $setting->about_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="cv_pdf" class="form-label">Resume Pdf</label>
                                <input name="cv_pdf" class="form-control form-control-sm bg-dark" id="cv_pdf"
                                    type="file" accept="application/pdf" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" disabled value="{{ $setting->phone }}" name="phone"
                                    class="form-control" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" disabled value="{{ $setting->email }}" name="email"
                                    class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="messenger_link" class="form-label">Messenger Link</label>
                                <input type="text" disabled value="{{ $setting->messenger_link }}"
                                    name="messenger_link" class="form-control" id="messenger_link">
                            </div>
                            <div class="mb-3">
                                <label for="facebook_link" class="form-label">Facebook Link</label>
                                <input type="text" disabled value="{{ $setting->facebook_link }}"
                                    name="facebook_link" class="form-control" id="facebook_link">
                            </div>
                            <div class="mb-3">
                                <label for="instagram_link" class="form-label">Instagram Link</label>
                                <input type="text" disabled value="{{ $setting->instagram_link }}"
                                    name="instagram_link" class="form-control" id="instagram_link">
                            </div>
                            <div class="mb-3">
                                <label for="github_link" class="form-label">GitHub Link</label>
                                <input type="text" disabled value="{{ $setting->github_link }}" name="github_link"
                                    class="form-control" id="github_link">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editBtn = document.getElementById('editBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const saveBtn = document.getElementById('saveBtn');
            const formElements = document.querySelectorAll('#settingForm input, #settingForm textarea');

            editBtn.addEventListener('click', function(e) {
                e.preventDefault();
                toggleFormState(true);
            });

            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                toggleFormState(false);
            });

            saveBtn.addEventListener('click', function() {
                e.preventDefault();
                toggleFormState(false);
            });


            function toggleFormState(enabled) {
                formElements.forEach(element => {
                    element.disabled = !enabled;
                });
                editBtn.classList.toggle('d-none');
                cancelBtn.classList.toggle('d-none');
                saveBtn.classList.toggle('d-none');
            }

            var el = document.getElementById('image_poster');
            $("#poster_image").on("change", function(event) {
                $("#uploadposterModal").modal('show');
                croppie = new Croppie(el, {
                    viewport: {
                        width: 600,
                        height: 600,
                        type: 'square'
                    },
                    boundary: {
                        width: 600,
                        height: 600
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

            $(".crop_poster_image").on("click", function() {
                croppie.result('base64').then(function(base64) {

                    $("#uploadposterModal").modal("hide");

                    $('.poster_remove').removeClass('d-none');

                    $('#poster-image').attr('src', base64);

                    $("input[name='poster_base64']").val(base64);
                    console.log($("#poster_image").val());
                    croppie.destroy();
                });
            });

            $('.poster_remove').click(function() {
                $('#poster-image').attr('src', 'https://placehold.co/550x550');
                $('.poster_remove').addClass('d-none');
                $('#poster_image').val('');
                $("input[name='poster_base64']").val('Empty');
            })


        });
    </script>
@endsection
