<div class="whitebox mt-3">

    <form id="uploadMediaForm" method="POST" action="{{ route('admin.upload.media') }}" enctype="multipart/form-data"
        onsubmit="event.preventDefault(); uploadMedia(this);">
        @csrf
        <div class="row align-items-end g-2">
            <div class="col-md-5">
                <label for="media_file" class="form-label">Upload Image</label>
                <input type="file" name="media_file" id="media_file" class="form-control" accept="image/*" required>
                <span class="error-text" id="media_file_error" style="color: red;"></span>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa-solid fa-upload me-1"></i> Upload
                </button>
            </div>
        </div>
    </form>



    <table id="mediaTable" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Title</th>
                <th>Url</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($media as $media)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $media->media_name }}</td>
                    <td>{{ $media->url }}</td>
                    <td><img src="{{ asset($media->url) }}" alt="{{ $media->media_name }}" width="80" height="80"
                            class="img-thumbnail media-select" data-id="{{ $media->id }}"
                            data-url="{{ asset($media->url) }}" style="cursor:pointer;">
                    </td>
                    <td>
                        <a href="#" class="link-danger" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
