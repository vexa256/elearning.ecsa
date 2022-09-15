<div class="col-md-4">
    <div class="card bg-primary">
        <div class="card-body p-0">
            <div class="alert alert-danger rounded-top alert-solid alert-label-icon border-0 rounded-0 m-0 d-flex align-items-center"
                role="alert">
                <i class=" ri-home-fill label-icon"></i>
                <div class="flex-grow-1 text-truncate">
                    Hello {{ Auth::user()->name }}<b></b>
                </div>
                <div class="flex-shrink-0">

                </div>
            </div>

            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="p-3">
                        <p class="fs-16 lh-base text-white">Welcom to the
                            ECSA-HC Regional Elearning Platform
                            <span class="fw-semibold"> <i
                                    class="mdi mdi-arrow-right"></i>
                        </p>
                        <div class="mt-3">
                            <a href="#"
                                class="btn btn-danger shadow-lg">About the
                                platform</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="px-3">
                        <img src="assets/images/user-illustarator-1.png"
                            class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- end card-body-->
    </div>
</div>
