<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Let\'s manage our course inventory.',
        $Msg = 'Add, remove and edit  the course inventory',
    ) !!}
</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Course', $Icon = 'fa-plus') }}
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Course Presentation</th>
                <th>Thumbnail</th>
                <th>Description</th>
                <th>Date Added</th>

                <th class="bg-dark text-light"> Update </th>
                <th class="bg-danger fw-bolder text-light"> Delete </th>



            </tr>
        </thead>
        <tbody>
            @isset($Courses)
                @foreach ($Courses as $data)
                    <tr>

                        <td>{{ $data->Course }}</td>



                        <td>
                            <a data-doc="  {{ $data->Course }} ({{ $data->VeryBriefDescription }})"
                                data-source="{{ asset('assets/data/' . $data->CoursePresentation) }}"
                                data-bs-toggle="modal" href="#PdfJS"
                                class="btn btn-sm  PdfViewer btn-info"> <i
                                    class="fas fa-file-pdf" aria-hidden="true"></i>
                            </a>
                        </td>


                        <td>

                            <a class="btn btn-danger btn-sm shadow-lg"
                                data-fslightbox="gallery"
                                href="{{ asset('assets/data/' . $data->CourseThumbnail) }}">
                                <i class="fas fa-binoculars" aria-hidden="true"></i>
                            </a>
                        </td>


                        <td>
                            {{ $data->VeryBriefDescription }}
                        </td>


                        <td>{!! date('F j, Y', strtotime($data->created_at)) !!}</td>




                        <td>

                            <a data-bs-toggle="modal"
                                class="btn shadow-lg btn-danger btn-sm admin"
                                href="#Update{{ $data->id }}">

                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>

                        </td>


                        <td>

                            {!! ConfirmBtn(
                                $data = [
                                    'msg' => 'You want to delete this record',
                                    'route' => route('DeleteData', [
                                        'id' => $data->id,
                                        'TableName' => 'courses',
                                    ]),
                                    'label' => '<i class="fas fa-trash"></i>',
                                    'class' => 'btn btn-danger btn-sm deleteConfirm2 admin',
                                ],
                            ) !!}

                        </td>





                    </tr>
                @endforeach
            @endisset



        </tbody>
    </table>
</div>
<!--end::Card body-->
@include('courses.NewCourse')



@isset($Courses)
    @foreach ($Courses as $up)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
        <form action="{{ route('MassUpdate') }}" class="" method="POST">
            @csrf

            <div class="row">
                <div class="mb-3 col-md-12">
                    <label id="label" for=""
                        class="required mt-3 form-label">Select
                        Course Operator
                        (Institution)
                    </label>
                    <select required name="IID"
                        class="form-select   form-select-solid"
                        data-control="select2" data-placeholder="Select a option">
                        <option value={{ $up->IID }}>{{ $up->Title }}
                            ({{ $up->VeryBriefDescription }})
                        </option>
                        @isset($Institutions)
                            @foreach ($Institutions as $up2)
                                <option value="{{ $up2->IID }}">
                                    {{ $up2->Title }}
                                    ({{ $up2->VeryBriefDescription }})
                                </option>
                            @endforeach
                        @endisset

                    </select>

                </div>





                <input type="hidden" name="id" value="{{ $up->id }}">

                <input type="hidden" name="TableName" value="courses">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '12', $te = '12', $TableName = 'courses') }}
            </div>


            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset


@include('pdf.PDFJS')
@include('scripts.fixjs')
