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
<div class="modal fade" id="lfmModal" tabindex="-1" aria-labelledby="lfmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Manager</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <iframe id="lfmFrame" src="" style="width:100%; height:80vh; border:none;"></iframe>
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
<!-- for chart -->

@stack('scripts')

<script>
    $(document).ready(function() {
        $('#example, #serviceTable, #itemTable, #reportTable')
            .DataTable({
                responsive: true
            });

    });
</script>
