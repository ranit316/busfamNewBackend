<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> Tarmac | Designed and Developed by <a href="https://busfam.com" target="_blank"
                    style="color:#18beb4; font-weight:bold;">Busfam</a>
            </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- File Manager Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="lfmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Manager</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">

            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<div id="backto-top"><i class="fa-solid fa-arrow-up"></i></div>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/sb-admin-2.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/waitMe.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>
{{-- <script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script> --}}
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<!-- for chart -->

@stack('scripts')

<script>
    $(document).ready(function() {
        $('#example, #serviceTable, #itemTable, #reportTable, #mediaTable')
            .DataTable({
                responsive: true
            });

    });
</script>

<script>
    $(document).ready(function() {
        $('#chooseImageBtn').on('click', function() {
            $.ajax({
                url: "{{ route('admin.media') }}", // Your route
                type: "GET",
                success: function(response) {
                    $('.modal-body').html(response);
                    $('#imageModal').modal('show');
                    $('.modal-body').find('#mediaTable').DataTable({
                        destroy: true, // ensures reinitialization
                        responsive: true,
                        pageLength: 10,
                        order: [
                            [0, 'desc']
                        ]
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch media:', error);
                }
            });
        });
    });
</script>

<script>
    function uploadMedia(form) {
        let formData = new FormData(form);
        let url = $(form).attr("action");

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#submitBtn").prop("disabled", true);
                $('body').waitMe({
                    effect: 'roundBounce',
                    text: '',
                    bg: 'rgba(255, 255, 255, 0.7)',
                    color: 'rgb(12, 10, 10)',
                });
            },
            success: function(response) {
                $('body').waitMe("hide");
                $("#submitBtn").prop("disabled", false);

                if (response.success) {
                    toastr.success(response.message);
                    // $('#imageModal').modal('hide');
                    $(form)[0].reset();
                    updateMediaTable(response.media);
                }
            },
            error: function(xhr) {
                $("#submitBtn").prop("disabled", false);
                $('body').waitMe("hide");

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach((key) => {
                        $("#" + key + "_error").text(errors[key][0]);
                    });
                    toastr.error("Please correct the errors and try again.");
                } else {
                    toastr.error("Something went wrong! Try again.");
                }
            }
        });
    }

    function updateMediaTable(mediaList) {
        let table = $("#mediaTable").DataTable();
        table.clear();

        mediaList.forEach(function(media, index) {
            let imageUrl = "{{ asset('') }}" + media.url;

            table.row.add([
                index + 1,
                media.media_name,
                media.url,
                `<img src="${imageUrl}" alt="${media.media_name}" class="img-thumbnail media-select" style="cursor:pointer;" width="80" height="80" data-id="${ media.id }"
                            data-url="${imageUrl}">`,
                `<a href="#" class="link-danger" title="Delete"><i class="fa-solid fa-trash-can"></i></a>`
            ]);
        });

        table.draw(false);
    }
</script>
<script>
    $(document).on('click', '.media-select', function() {
        let imageId = $(this).data('id');
        let imageUrl = $(this).data('url');

        // Set preview and hidden input
        $('#image_preview').attr('src', imageUrl).show();
        $('#image_path').val(imageId);
        $('#removeImageBtn').show();

        // Close modal
        $('#imageModal').modal('hide');


        $('#removeImageBtn').on('click', function() {
            $('#image_preview').attr('src', '').hide();
            $('#image_path').val('');
            $(this).hide();
        });
    });
</script>
<script>
    CKEDITOR.replace('.ckeditor', {
        height: 250,
        removeButtons: 'PasteFromWord'
    });
</script>
