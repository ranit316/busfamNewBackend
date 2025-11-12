@extends('admin.layout.app')

@section('section')
    <div class="page-content container">
        <div class="wrapper">

            <div class="row align-items-center mb-3">
                <div class="col-md-9 col-7">
                    <div class="page-header">
                        <h3>Edit General Setting Page</h3>
                    </div>
                </div>
            </div>


            <form id="companyForm" action="{{ route('admin.setting.webSettig.updae') }}" method="post"
                enctype="multipart/form-data" onsubmit="event.preventDefault(); updateForm(this);">
                @csrf

                <!-- Bootstrap 5 Vertical Tabs -->
                <div class="container py-4">
                    <div class="row">
                        <div class="col-md-3 border-end">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-general-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-general" type="button" role="tab"
                                    aria-controls="v-pills-general" aria-selected="true">
                                    General Setting
                                </button>
                                <button class="nav-link" id="v-pills-about-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-about" type="button" role="tab"
                                    aria-controls="v-pills-about" aria-selected="false">
                                    About Us
                                </button>
                                <button class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-contact" type="button" role="tab"
                                    aria-controls="v-pills-contact" aria-selected="false">
                                    Contact Details
                                </button>
                                <button class="nav-link" id="v-pills-recognise-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-recognise" type="button" role="tab"
                                    aria-controls="v-pills-recognise" aria-selected="false">
                                    Recognised By
                                </button>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">

                                <!-- General Setting -->
                                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel"
                                    aria-labelledby="v-pills-general-tab">
                                    <div class="row">
                                        <!-- Fav Icon -->
                                        <div class="col-6 mb-4">
                                            <label>Fav Icon</label>
                                            <div class="featured-image-wrapper border rounded p-3 bg-light position-relative"
                                                style="max-width: 320px;">
                                                <div class="img_holder text-center mb-3">
                                                    <img src="{{ !empty($settings['fav_icon']) ? getMediaUrl($settings['fav_icon']) : '' }}"
                                                        alt="Preview" class="img-fluid rounded shadow-sm image_preview"
                                                        style="max-height: 180px; object-fit: cover;">
                                                </div>
                                                <div class="text-center">
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm chooseImageBtn"
                                                        onclick="openMediaModal(this)"
                                                        style="{{ !empty($settings['fav_icon']) ? 'display:none;' : '' }}">
                                                        <i class="fa-solid fa-image me-1"></i> Choose Image
                                                    </button>
                                                </div>
                                                <div class="remove_button position-absolute" style="top:10px; right:10px;">
                                                    <button type="button" class="btn btn-danger btn-sm removeImageBtn"
                                                        style="{{ !empty($settings['fav_icon']) ? '' : 'display:none;' }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" id="image_path" name="fav_icon">
                                            </div>
                                        </div>

                                        <!-- Logo 1 -->
                                        <div class="col-6 mb-4">
                                            <label>Logo 1</label>
                                            <div class="featured-image-wrapper border rounded p-3 bg-light position-relative"
                                                style="max-width: 320px;">
                                                <div class="img_holder text-center mb-3">
                                                    <img src="{{ !empty($settings['logo1']) ? getMediaUrl($settings['logo1']) : '' }}"
                                                        alt="Preview" class="img-fluid rounded shadow-sm image_preview"
                                                        style="max-height: 180px; object-fit: cover;">
                                                </div>
                                                <div class="text-center">
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm chooseImageBtn"
                                                        onclick="openMediaModal(this)"
                                                        style="{{ !empty($settings['logo1']) ? 'display:none;' : '' }}">
                                                        <i class="fa-solid fa-image me-1"></i> Choose Image
                                                    </button>
                                                </div>
                                                <div class="remove_button position-absolute" style="top:10px; right:10px;">
                                                    <button type="button" class="btn btn-danger btn-sm removeImageBtn"
                                                        style="{{ !empty($settings['logo1']) ? '' : 'display:none;' }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" id="image_path" name="logo1">
                                            </div>
                                        </div>

                                        <!-- Logo 2 -->
                                        <div class="col-6 mb-4">
                                            <label>Logo 2</label>
                                            <div class="featured-image-wrapper border rounded p-3 bg-light position-relative"
                                                style="max-width: 320px;">
                                                <div class="img_holder text-center mb-3">
                                                    <img src="{{ !empty($settings['logo2']) ? getMediaUrl($settings['logo2']) : '' }}"
                                                        alt="Preview" class="img-fluid rounded shadow-sm image_preview"
                                                        style="max-height: 180px; object-fit: cover;">
                                                </div>
                                                <div class="text-center">
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm chooseImageBtn"
                                                        onclick="openMediaModal(this)"
                                                        style="{{ !empty($settings['logo2']) ? 'display:none;' : '' }}">
                                                        <i class="fa-solid fa-image me-1"></i> Choose Image
                                                    </button>
                                                </div>
                                                <div class="remove_button position-absolute"
                                                    style="top:10px; right:10px;">
                                                    <button type="button" class="btn btn-danger btn-sm removeImageBtn"
                                                        style="{{ !empty($settings['logo2']) ? '' : 'display:none;' }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" id="image_path" name="logo2">
                                            </div>
                                        </div>

                                        <!-- Mobile Logo -->
                                        <div class="col-6 mb-4">
                                            <label>Mobile Logo</label>
                                            <div class="featured-image-wrapper border rounded p-3 bg-light position-relative"
                                                style="max-width: 320px;">
                                                <div class="img_holder text-center mb-3">
                                                    <img src="{{ !empty($settings['mobile_logo']) ? getMediaUrl($settings['mobile_logo']) : '' }}" alt="Preview"
                                                        class="img-fluid rounded shadow-sm image_preview"
                                                        style="max-height: 180px; object-fit: cover;">
                                                </div>
                                                <div class="text-center">
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm chooseImageBtn"
                                                        onclick="openMediaModal(this)" style="{{ !empty($settings['mobile_logo']) ? 'display:none;' : '' }}">
                                                        <i class="fa-solid fa-image me-1"></i> Choose Image
                                                    </button>
                                                </div>
                                                <div class="remove_button position-absolute"
                                                    style="top:10px; right:10px;">
                                                    <button type="button" class="btn btn-danger btn-sm removeImageBtn"
                                                        style="{{ !empty($settings['mobile_logo']) ? '' : 'display:none;' }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" id="image_path" name="mobile_logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- About Us -->
                                <div class="tab-pane fade" id="v-pills-about" role="tabpanel"
                                    aria-labelledby="v-pills-about-tab">
                                    <label>About Us</label>
                                    <textarea name="about_us" id="about_us" class="form-control mb-2 ckeditor" rows="6">{!! $settings['about_us'] !!}</textarea>
                                </div>

                                <!-- Contact Details -->
                                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel"
                                    aria-labelledby="v-pills-contact-tab">
                                    <label>Address</label>
                                    <textarea name="address" id="address" class="form-control mb-2 ckeditor" rows="6">{!! $settings['address'] !!}</textarea>

                                    <div class="row">
                                        <div class="col-6">
                                            <label>Number 1</label>
                                            <input type="number" class="form-control mb-2" name="number_1"
                                                id="number_1" value="{{ $settings['number_1'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label>Number 2</label>
                                            <input type="number" class="form-control mb-2" name="number_2"
                                                id="number_2" value="{{ $settings['number_2'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label>WhatsApp 1</label>
                                            <input type="number" class="form-control mb-2" name="wa_1"
                                                id="wa_1" value="{{ $settings['wa_1'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label>WhatsApp 2</label>
                                            <input type="number" class="form-control mb-2" name="wa_2"
                                                id="wa_2" value="{{ $settings['wa_2'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label>Email 1</label>
                                            <input type="text" class="form-control mb-2" name="email_1"
                                                id="email_1" value="{{ $settings['email_1'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label>Email 2</label>
                                            <input type="text" class="form-control mb-2" name="email_2"
                                                id="email_2" value="{{ $settings['email_2'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label>Career 1</label>
                                            <input type="text" class="form-control mb-2" name="career_1"
                                                id="career_1" value="{{ $settings['career_1'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label>Career 2</label>
                                            <input type="text" class="form-control mb-2" name="career_2"
                                                id="career_2" value="{{ $settings['career_2'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Recognised By -->
                                <div class="tab-pane fade" id="v-pills-recognise" role="tabpanel"
                                    aria-labelledby="v-pills-recognise-tab">
                                    <label>Recognised Logo</label>

                                    <table class="table table-striped align-middle">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            @forelse($recognise as $index => $imageId)
                                                <tr>
                                                    <td>{{ $loop->iteration }}.</td>
                                                    <td>
                                                        <div class="image-wrapper text-center">
                                                            <img src="{{ getMediaUrl($imageId) }}"
                                                                class="img-fluid rounded shadow-sm mb-2 image_preview"
                                                                style="max-height:100px; {{ $imageId ? '' : 'display:none;' }}">

                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm chooseImageBtn"
                                                                onclick="openMediaModal(this)"
                                                                style="{{ $imageId ? 'display:none;' : '' }}">
                                                                <i class="fa-solid fa-image me-1"></i> Choose Image
                                                            </button>

                                                            <button type="button"
                                                                class="btn btn-danger btn-sm removeImageBtn"
                                                                style="{{ $imageId ? '' : 'display:none;' }}">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>

                                                            <input type="hidden" name="recognise[]" class="image_path"
                                                                value="{{ $imageId }}">
                                                        </div>
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
                                                <!-- Default row if no data -->
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

                                                            <input type="hidden" name="recognise[]" class="image_path">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-success btn-sm add-row">+</button>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end"><input type="submit" class="btn btn-primary" value="Publish"></div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            // ➕ Add new row
            $(document).on('click', '.add-row', function() {
                let tableBody = $('#tableBody');
                let lastRow = tableBody.find('tr:last');
                let newRow = lastRow.clone();

                // Reset image preview + hidden field
                newRow.find('.image_preview').hide().attr('src', '');
                newRow.find('.image_path').val('');
                newRow.find('.chooseImageBtn').show();
                newRow.find('.removeImageBtn').hide();

                // Hide all add buttons except last one
                tableBody.find('.add-row').hide();
                newRow.find('.add-row').show();

                // Append new row
                tableBody.append(newRow);

                // Update serial numbers
                tableBody.find('tr').each(function(i) {
                    $(this).find('td:first').text((i + 1) + '.');
                });
            });

            // ➖ Remove row
            $(document).on('click', '.remove-row', function() {
                let tableBody = $('#tableBody');
                if (tableBody.find('tr').length > 1) {
                    $(this).closest('tr').remove();

                    // Update serial numbers
                    tableBody.find('tr').each(function(i) {
                        $(this).find('td:first').text((i + 1) + '.');
                    });

                    // Ensure only last row has add button
                    tableBody.find('.add-row').hide();
                    tableBody.find('tr:last .add-row').show();
                }
            });

        });
    </script>
@endpush
