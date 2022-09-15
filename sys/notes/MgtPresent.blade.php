<div class="row">
    <div class="col-md-12">
        <!--begin::Card body-->
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            {!! Alert(
                $icon = 'fa-info',
                $class = 'alert-primary',
                $Title = $CourseName . ' Presentations',
                $Msg = 'View all presentations attached to the  module ' . $ModuleName,
            ) !!}


        </div>
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">

            {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Presentation ', $Icon = 'fa-plus') }}



            <table
                class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr
                        class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Course Name</th>
                        <th>Module Name</th>
                        <th>Notes Title</th>
                        <th>Brief Description</th>
                        <th>View Notes</th>

                        <th class="bg-danger fw-bolder text-light"> Delete
                        </th>






                    </tr>
                </thead>
                <tbody>
                    @isset($Notes)
                        @foreach ($Notes as $data)
                            <tr>

                                <td>{{ $CourseName }}</td>
                                <td>{{ $ModuleName }}</td>

                                <td>{{ $data->Title }}</td>
                                <td>{{ $data->VeryBriefDescription }}</td>

                                <td>
                                    <a data-doc="  {{ $data->Title }} ({{ $data->VeryBriefDescription }})"
                                        data-source="{{ asset($data->url) }}"
                                        data-bs-toggle="modal" href="#PdfJS"
                                        class="btn btn-sm  PdfViewer btn-info"> <i
                                            class="fas fa-file-pdf"
                                            aria-hidden="true"></i>
                                    </a>
                                </td>

                                {{-- <td>{!! date('F j, Y', strtotime($data->created_at)) !!}</td> --}}





                                <td>

                                    {!! ConfirmBtn(
                                        $data = [
                                            'msg' => 'You want to delete this record',
                                            'route' => route('DeleteDoc', [
                                                'id' => $data->id,
                                                'TableName' => 'notes',
                                            ]),
                                            'label' => '<i class="fas fa-trash"></i>',
                                            'class' => 'btn btn-danger btn-sm deleteConfirm admin',
                                        ],
                                    ) !!}

                                </td>





                            </tr>
                        @endforeach
                    @endisset



                </tbody>
            </table>
        </div>

    </div>
</div>



@include('pdf.PDFJS')

@include('notes.NewPresent')
