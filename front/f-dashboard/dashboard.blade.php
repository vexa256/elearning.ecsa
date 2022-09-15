@include('f-dashboard.welcome')





<div class="col-md-4">
    <div class="card bg-soft-success bg-gradient">
        <div class="card-body p-0">
            <div class="alert alert-primary rounded-top alert-solid alert-label-icon border-0 rounded-0 m-0 d-flex align-items-center"
                role="alert">
                <i class="ri-book-mark-line label-icon"></i>
                <div class="flex-grow-1 text-truncate">
                    Course List<b></b>
                </div>
                <div class="flex-shrink-0">

                </div>
            </div>

            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="p-3">
                        <p class="fs-16 lh-base text-danger">
                            {{ Auth::user()->name }}, Click the button below to
                            explore all our courses
                            <span class="fw-semibold"> <i
                                    class="mdi mdi-arrow-right"></i>
                        </p>
                        <div class="mt-3">
                            <a href="#"
                                class="btn btn-primary	 shadow-lg">Explore
                                Courses</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="px-3">
                        <img src="{{ asset('assets/images/user-illustarator-1.png') }}"
                            class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- end card-body-->
    </div>
</div>

<div class="col-md-4">
    <div class="card bg-soft-primary bg-gradient">
        <div class="card-body p-0">
            <div class="alert alert-success rounded-top alert-solid alert-label-icon border-0 rounded-0 m-0 d-flex align-items-center"
                role="alert">
                <i class=" ri-attachment-fill label-icon"></i>
                <div class="flex-grow-1 text-truncate">
                    Certifications<b></b>
                </div>
                <div class="flex-shrink-0">

                </div>
            </div>

            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="p-3">
                        <p class="fs-16 lh-base text-primary">
                            To see your certificates or certification status.
                            Click the button below.
                            <span class="fw-semibold"> <i
                                    class="mdi mdi-arrow-right"></i>
                        </p>
                        <div class="mt-3">
                            <a href="#"
                                class="btn btn-danger	 shadow-lg">Certification</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="px-3">
                        <img src="{{ asset('assets/images/user-illustarator-1.png') }}"
                            class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- end card-body-->
    </div>
</div>


<div class="col-xl-4 col-md-6">
    <div class="card bg-secondary card-animate">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="fw-medium text-light mb-0">Users</p>
                    <h2 class="mt-4 ff-secondary text-light fw-semibold"><span
                            class="counter-value"
                            data-target="28.05">28.05</span>k</h2>
                    <p class="mb-0 text-muted"><span
                            class="badge bg-light text-dark mb-0"><i
                                class="ri-arrow-up-line align-middle"></i>
                            Approved Courses
                        </span> </p>
                </div>
                <div>
                    <div class="avatar-sm flex-shrink-0">
                        <span
                            class="avatar-title bg-soft-info rounded-circle fs-2">
                            <i
                                class=" text-light ri-book-open-line
                            "></i>
                        </span>
                    </div>
                </div>
            </div>
        </div><!-- end card body -->
    </div> <!-- end card-->
</div>

<div class="col-xl-4 col-md-6">
    <div class="card bg-primary card-animate">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="fw-medium text-light mb-0">Completed Tests
                    </p>
                    <h2 class="mt-4 ff-secondary text-light fw-semibold"><span
                            class="counter-value"
                            data-target="28.05">28.05</span>k</h2>
                    <p class="mb-0 text-muted"><span
                            class="badge bg-light text-dark mb-0"><i
                                class="ri-arrow-up-line align-middle"></i>
                            Attempted Tests
                        </span> </p>
                </div>
                <div>
                    <div class="avatar-sm flex-shrink-0">
                        <span
                            class="avatar-title bg-soft-info rounded-circle fs-2">
                            <i
                                class=" text-light fw-bolder ri-task-fill
                            "></i>
                        </span>
                    </div>
                </div>
            </div>
        </div><!-- end card body -->
    </div> <!-- end card-->
</div>

<div class="col-xl-4 col-md-6">
    <div class="card bg-success card-animate">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="fw-medium text-light fw-bolder mb-0">Your
                        Certifications</p>
                    <h2 class="mt-4 ff-secondary text-light fw-semibold"><span
                            class="counter-value"
                            data-target="28.05">28.05</span>k</h2>
                    <p class="mb-0 text-muted"><span
                            class="badge bg-light text-dark mb-0"><i
                                class="ri-arrow-up-line align-middle"></i>
                            Certificates Attained
                        </span> </p>
                </div>
                <div>
                    <div class="avatar-sm flex-shrink-0">
                        <span
                            class="avatar-title bg-soft-info rounded-circle fs-2">
                            <i
                                class=" text-light fw-bolder ri-book-open-fill
                            "></i>
                        </span>
                    </div>
                </div>
            </div>
        </div><!-- end card body -->
    </div> <!-- end card-->
</div>
