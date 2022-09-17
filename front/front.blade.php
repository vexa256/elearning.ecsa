@include('f-header.header')
@include('f-header.top')
@include('f-nav.nav')

<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $Title }} |
                            {{ $Desc }}</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column h-100">
                        <div class="row h-100">

                            @isset($Page)
                                @include($Page)
                            @endisset




                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@include('f-footer.footer')
@include('f-scripts.scripts')
