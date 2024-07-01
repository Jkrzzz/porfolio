@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4 ">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Skill</h6>
                        <form action="{{ route('skill.update', ['skill' => $skill->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Skill <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $skill->name }}" placeholder="name"
                                    class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="item_skill" class="form-label">Skill Item <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" id="item_skill" class="form-control" placeholder="Skill">
                                    <input type="text" id="item_level" class="form-control" placeholder="Level">
                                    <button class="btn btn-secondary add-input-group" type="button">Add</button>
                                </div>
                                @foreach ($skill->skillItem as $item)
                                    <div class="input-group mb-3">
                                        <input type="text" name="skill_item[]" class="form-control"
                                            value="{{ $item->skill_item_name }}" placeholder="Skill">
                                        <input type="text" name="skill_level[]" class="form-control"
                                            value="{{ $item->skill_level_name }}" placeholder="Level">
                                        <button class="btn btn-danger remove-input-group" type="button">Remove</button>
                                    </div>
                                @endforeach
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
    <script>
        $(document).ready(function() {
            $('.add-input-group').click(function() {


                var inputGroup = '<div class="input-group mb-3">' +
                    `<input type="text" name="skill_item[]" class="form-control" value="${$('#item_skill').val()}" placeholder="Skill">` +
                    `<input type="text" name="skill_level[]" class="form-control" value="${$('#item_level').val()}" placeholder="Level">` +
                    '<button class="btn btn-danger remove-input-group" type="button">Remove</button>' +
                    '</div>';
                $(this).parent().after(inputGroup);
                $('#item_skill').val("");
                $('#item_level').val("");
            });

            $(document).on('click', '.remove-input-group', function() {
                $(this).parent().remove();
            });
        });
    </script>
@endsection
