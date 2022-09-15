@isset($Courses)
    @foreach ($Courses as $data)
        <div class="card product shadow-lg">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 fw-bolder flex-grow-1">
                    #CN-EC{{ $data->id * 9 }}
                </h4>


            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-sm-auto">
                        <div class="avatar-xl bg-light rounded p-1">
                            <img src="{{ asset('assets/data/' . $data->CourseThumbnail) }}"
                                alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h5 class="fs-20 text-truncate"><a href="#"
                                class="text-dark">{{ $data->Course }}</a></h5>
                        <ul class="list-inline text-primary">
                            <li class="list-inline-item">
                                {{ $data->VeryBriefDescription }}</li>

                        </ul>


                    </div>

                </div>
            </div>
            <!-- card body -->
            <div class="card-footer bg-soft-warning shadow-lg">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <div class="d-flex flex-wrap my-n1">
                            <div>

                                @if (Auth::user()->role == 'Incomplete')
                                    <a data-bs-toggle="modal" href="#NewApp"
                                        class="d-block  btn-lg  text-light fw-bolder btn btn-primary p-1 px-2"><i
                                            class="  ri-calendar-check-fill
                                    text-light fw-bolder align-bottom me-1"></i>
                                        Complete Registration</a>
                                @else
                                    <a href="{{ route('Explore', ['id' => $data->id]) }}"
                                        class="d-block  btn-lg  text-light fw-bolder btn btn-primary p-1 px-2"><i
                                            class="  ri-calendar-check-fill
                                    text-light fw-bolder align-bottom me-1"></i>
                                        Explore Course</a>
                                @endif


                            </div>
                            <div>
                                <a data-doc="  {{ $data->Course }} ({{ $data->VeryBriefDescription }})"
                                    data-source="{{ asset('assets/data/' . $data->CoursePresentation) }}"
                                    data-bs-toggle="modal" href="#FPdfJS"
                                    class="d-block PdfViewer btn-lg  text-light fw-bolder btn btn-success ms-3 p-1 px-2"><i
                                        class="   ri-questionnaire-fill

                                        text-light fw-bolder align-bottom me-1"></i>
                                    About Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div
                            class="d-flex align-items-center gap-2 text-primary fw-bolder">
                            <div>Course Operator :</div>
                            <h5 class="fs-14 mb-0"><span
                                    class="product-line-price text-primary">{{ $data->Title }}</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card footer -->
        </div>
    @endforeach
@endisset
