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
                                    <div class="input-group">
                                        <input type="text" id="image_path" name="image" class="form-control"
                                            placeholder="Choose image" readonly>
                                        <button type="button" class="btn btn-outline-primary"
                                            onclick="openFileManager()">Choose Image</button>
                                    </div>
                                    <div class="mt-2">
                                        <img id="image_preview" src="" alt=""
                                            style="max-width: 250px; display:none; border-radius:8px;">
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


