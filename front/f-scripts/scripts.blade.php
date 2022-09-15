</div>
</div>
</div>

@include('modals.modals')


<!-- JAVASCRIPT -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- <script type="text/javascript"
    src="{{ asset('assets/js/standalone/selectize.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> --}}
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
</script>


<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/pdfobject.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@include('not.not')
@include('scripts.editor')
<script>
    $(document).ready(function() {
        $(document).on("click", ".PdfViewer", function() {
            var path = $(this).data("source");
            var doc = $(this).data("doc");
            PDFObject.embed(path, "#adobe-dc-view");
        });
    });
</script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>


</body>


</html>
