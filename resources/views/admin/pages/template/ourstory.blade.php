@extends('admin.layout.app')

@section('section')
    <div class="page-content container">
        <div class="wrapper">

            <div class="row align-items-center mb-3">
                <div class="col-md-9 col-7">
                    <div class="page-header">
                        <h3>Edit {{ $page->page_name }} Page</h3>
                    </div>
                </div>
                <div class="col-md-3 col-5">
                    <div class="page_header_btn">
                        <a class="btn btn-primary dropdown-toggle" href="{{ route('admin.pages.index') }}">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>

            <form id="companyForm" action="{{ route('admin.pages.update', $page->id) }}" method="post"
                enctype="multipart/form-data" onsubmit="event.preventDefault(); updateForm(this);">
                @csrf
                @method('PUT')

                <div class="row g-2">
                    <div class="col-md-12 col-lg-8">
                        <div class="whitebox mb-2">
                            <label>Enter Page Name</label>
                            <input type="text" class="form-control mb-2" name="page_name" id="page_name"
                                value="{{ $page->page_name }}" readonly>
                            <span class="error-text" id="page_name_error" style="color: red;"></span>

                            <label>Slug (URL)</label>
                            <input type="text" class="form-control mb-2" name="slug" id="slug"
                                value="{{ $page->slug ?? '' }}" placeholder="auto-generated from page name">
                            <span class="error-text" id="slug_error" style="color: red;"></span>

                            <div class="mt-2 mb-2">
                                <small><strong>Permalink:</strong>
                                    <span id="permalink">{{ url('/') }}/<span
                                            id="permalink-slug">{{ $page->slug ?? '' }}</span></span>
                                </small>
                            </div>
                        </div>


                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Section-1
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <label>About Us</label>
                                        <input type="text" class="form-control" name="about_heading" id="about_heading">
                                        <label>About Content</label>
                                        <textarea name="about_content" id="about_content" class="form-control mb-2 ckeditor" rows="6">
                                        </textarea>
                                        <label>Group Heading</label>
                                        <input type="text" class="form-control" name="group_heading" id="group_heading">
                                        <label>Group Content</label>
                                        <textarea name="group_content" id="group_content" class="form-control mb-2 ckeditor" rows="6">
                                        </textarea>
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
