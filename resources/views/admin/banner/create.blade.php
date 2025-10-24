@extends('admin.layout.app')

@section('section')
    <div class="page-content container">
        <div class="wrapper">
            <div class="row align-items-center mb-3">
                <div class="col-md-9 col-7">
                    <div class="page-header">
                        <h3>Create Banner </h3>
                    </div>
                </div>
                <div class="col-md-3 col-5">
                    <div class="page_header_btn">
                        <a class="btn btn-primary dropdown-toggle" href="{{ route('admin.banners.index') }}">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>

            <form id="companyForm" action="{{ route('admin.banners.store') }}" method="post" enctype="multipart/form-data"
                onsubmit="event.preventDefault(); submitForm(this);">
                @csrf
                <div class="row g-2">
                    <div class="col-md-6 col-lg-8">
                        <div class="item_name">
                            <div class="whitebox mb-4">
                                <label>Heading</label>
                                <input type="text" class="form-control" placeholder="Enter Headline" name="text"
                                    id="text">
                                <span class="error-text" id="text_error" style="color: red;"></span>

                                <div class="mb-2">
                                    <label>Banner Image</label><br>
                                    <div class="featured-image-wrapper border rounded p-3 bg-light position-relative"
                                        style="max-width: 320px;">
                                        <div class="img_holder text-center mb-3">
                                            <img id="image_preview" src="" alt="Preview"
                                                class="img-fluid rounded shadow-sm"
                                                style="max-height: 180px; object-fit: cover; display:none;">
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                id="chooseImageBtn">
                                                <i class="fa-solid fa-image me-1"></i> Choose Image
                                            </button>
                                        </div>

                                        <div class="remove_button position-absolute" style="top:10px; right:10px;">
                                            <button type="button" class="btn btn-danger btn-sm" id="removeImageBtn"
                                                style="display:none;">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>

                                        <input type="hidden" id="image_path" name="image">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
