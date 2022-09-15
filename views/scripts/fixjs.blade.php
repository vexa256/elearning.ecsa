<script>
    $(document).ready(function() {

        $(".DateArea").flatpickr({
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d"
        });


        $('[data-control="select2"]').select2();


        $(".mytable").DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            pageLength: 15,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
            dom: "Bfrtip",

            buttons: ["excel"],
        });
    });
</script>


@isset($rem)


    @if (is_array($rem))
        <script>
            var FieldRem = {!! json_encode($rem) !!};

            // Put the object into storage
            sessionStorage.setItem('FieldRem', JSON.stringify(FieldRem));
        </script>
    @else
        <script>
            var FieldRem = {!! $rem !!};

            // Put the object into storage
            sessionStorage.setItem('FieldRem', JSON.stringify(FieldRem));
        </script>
    @endif

@endisset


<script
    src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}">
</script>
