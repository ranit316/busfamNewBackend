@extends('admin.layout.app')

@section('section')
    <!-- Begin Page Content -->
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

            <div class="row g-2">
                <form id="companyForm" action="#" method="post" enctype="multipart/form-data"
                    onsubmit="event.preventDefault(); submitForm(this);">
                    @csrf

                    <div class="col-md-12 col-lg-8">
                        <div class="whitebox mb-4 row">
                            <label>Enter Page Name</label>
                            <input type="text" class="form-control" name="page_name" id="page_name"
                                value="{{ $page->page_name }}" readonly>
                            <span class="error-text" id="page_name_error" style="color: red;"></span>

                            <label>Slug (URL)</label>
                            <input type="text" class="form-control" name="slug" id="slug"
                                value="{{ $page->slug ?? '' }}" placeholder="auto-generated from page name">
                            <span class="error-text" id="slug_error" style="color: red;"></span>

                            <div class="mt-2">
                                <small><strong>Permalink:</strong>
                                    <span id="permalink">{{ url('/') }}/<span
                                            id="permalink-slug">{{ $page->slug ?? '' }}</span></span>
                                </small>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function slugify(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/[\s\W-]+/g, '-'); // Replace spaces & symbols with hyphen
        }

        $(document).ready(function() {
            // When typing page name
            $('#page_name').on('input', function() {
                let pageName = $(this).val();
                let slug = slugify(pageName);
                $('#slug').val(slug);
                $('#permalink-slug').text(slug);
            });

            // When editing slug manually
            $('#slug').on('input', function() {
                let slug = slugify($(this).val());
                $(this).val(slug);
                $('#permalink-slug').text(slug);
            });
        });
    </script>
@endpush
