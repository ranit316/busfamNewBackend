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
                                        <label>Welcome to Busfam</label>
                                        <textarea name="welcome_content" id="welcome_content" class="form-control mb-2 ckeditor" rows="6">
                                {!! $page->content_key_value['welcome_content'] ?? '' !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Section 2
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <label>Text 2</label>
                                        <textarea class="form-control mb-2 ckeditor" name="text_2" id="text_2" rows="6">{!! $page->content_key_value['text_2'] ?? '' !!}</textarea>

                                        <label>Text 2 Video Link</label>
                                        <input type="text" class="form-control" name="text_2_video" id="text_2_video"
                                            value="{{ $page->content_key_value['text_2_video'] ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">Section 3</button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <label>Support Offline Design</label>
                                        <textarea class="form-control mb-2 ckeditor" name="support_offline_design" id="support_offline_design" rows="6">{!! $page->content_key_value['support_offline_design'] ?? '' !!}</textarea>

                                        <label>Support Offline Design Video</label>
                                        <input type="text" class="form-control" name="support_offline_design_video"
                                            id="support_offline_design_video"
                                            value="{{ $page->content_key_value['support_offline_design_video'] ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                                        aria-controls="flush-collapseFour">Section 4</button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @php
                                            // Decode the award_press content if it exists
                                            $awardPress = isset($page->content_key_value['award_press'])
                                                ? json_decode($page->content_key_value['award_press'], true)
                                                : [];
                                        @endphp
                                        <label>Awards & Press Release</label>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Image</th>
                                                    <th>Text</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody id="tableBody">
                                                @forelse ($awardPress as $index => $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td>
                                                            <div class="image-wrapper text-center">
                                                                <img src="{{ getMediaUrl($item['image']) }}"
                                                                    class="img-fluid rounded shadow-sm mb-2 image_preview"
                                                                    style="max-height: 100px; {{ $item['image'] ? '' : 'display:none;' }}">

                                                                <button type="button"
                                                                    class="btn btn-outline-primary btn-sm chooseImageBtn"
                                                                    onclick="openMediaModal(this)"
                                                                    style="{{ $item['image'] ? 'display:none;' : '' }}">
                                                                    <i class="fa-solid fa-image me-1"></i> Choose Image
                                                                </button>

                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm removeImageBtn"
                                                                    style="{{ $item['image'] ? '' : 'display:none;' }}">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>

                                                                <input type="hidden" name="images[]" class="image_path"
                                                                    value="{{ $item['image'] }}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="texts[]" class="form-control"
                                                                value="{{ $item['text'] }}" placeholder="Enter text">
                                                        </td>
                                                        <td>
                                                            @if ($loop->last)
                                                                <button type="button"
                                                                    class="btn btn-success btn-sm add-row">+</button>
                                                            @endif
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm remove-row">-</button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    {{-- Default empty row --}}
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>
                                                            <div class="image-wrapper text-center">
                                                                <img src=""
                                                                    class="img-fluid rounded shadow-sm mb-2 image_preview"
                                                                    style="max-height: 100px; display:none;">
                                                                <button type="button"
                                                                    class="btn btn-outline-primary btn-sm chooseImageBtn"
                                                                    onclick="openMediaModal(this)">
                                                                    <i class="fa-solid fa-image me-1"></i> Choose Image
                                                                </button>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm removeImageBtn"
                                                                    style="display:none;">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                                <input type="hidden" name="images[]" class="image_path">
                                                            </div>
                                                        </td>
                                                        <td><input type="text" name="texts[]" class="form-control"
                                                                placeholder="Enter text"></td>
                                                        <td><button type="button"
                                                                class="btn btn-success btn-sm add-row">+</button></td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFive" aria-expanded="false"
                                        aria-controls="flush-collapseFive">Section 5</button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <label>Why Choose Digital Marketing ?</label>
                                        <textarea class="form-control mb-2 ckeditor" name="why_choose_digital_marketing" id="Why_Choose_Digital_Marketing"
                                            rows="6">{!! $page->content_key_value['why_choose_digital_marketing'] ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="additem">
                            <h3>Publish</h3>
                            <div class="additem_body">

                                <input type="submit" class="btn btn-primary" value="Publish">

                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

    <script>
        $(document).ready(function() {
            let rowCount = 1;

            // ➕ Add new row
            $(document).on("click", ".add-row", function() {
                let lastRow = $("#tableBody tr:last");
                let newRow = lastRow.clone();
                rowCount++;

                // Reset inputs and states
                newRow.find("td:first").text(rowCount + ".");
                newRow.find("input[type='text']").val("");
                newRow.find(".image_preview").attr("src", "").hide();
                newRow.find(".image_path").val("");
                newRow.find(".removeImageBtn").hide();
                newRow.find(".chooseImageBtn").show();

                // Ensure button calls openMediaModal correctly
                newRow.find(".chooseImageBtn").attr("onclick", "openMediaModal(this)");

                // Replace last column buttons
                newRow.find("td:last").html(`
                <button type="button" class="btn btn-success btn-sm add-row">+</button>
                <button type="button" class="btn btn-danger btn-sm remove-row">-</button>
            `);
                // console.log(newRow);
                // Append new row
                $("#tableBody").append(newRow);

                // Update numbering and buttons
                updateRowButtons();
            });

            // ➖ Remove row
            $(document).on("click", ".remove-row", function() {
                if ($("#tableBody tr").length > 1) {
                    $(this).closest("tr").remove();
                    updateRowButtons();
                }
            });

            // 🔁 Update row numbering and button states
            function updateRowButtons() {
                $("#tableBody tr").each(function(index) {
                    $(this).find("td:first").text((index + 1) + ".");
                });

                // Make sure only the last row has the "+" button
                $("#tableBody tr").each(function(index) {
                    if (index === $("#tableBody tr").length - 1) {
                        $(this).find("td:last").html(`
                        <button type="button" class="btn btn-success btn-sm add-row">+</button>
                        <button type="button" class="btn btn-danger btn-sm remove-row">-</button>
                    `);
                    } else {
                        $(this).find("td:last").html(`
                        <button type="button" class="btn btn-danger btn-sm remove-row">-</button>
                    `);
                    }
                });
            }

            // ❌ Remove selected image per row
            $(document).on('click', '.removeImageBtn', function() {
                let row = $(this).closest('tr');
                row.find('.image_preview').attr('src', '').hide();
                row.find('.image_path').val('');
                row.find('.removeImageBtn').hide();
                row.find('.chooseImageBtn').show();
            });
        });
    </script>
@endpush
