<div class="row">
    <div class="col-md-6">
        <div style="background-color: white !important;"
            class="card-body bg-light pt-3 bg-light shadow-lg table-responsive">
            <div class="card-title bg-light"
                style="background-color: white !important;">
                <h4>
                    Document Course Notes
                </h4>
            </div>

            {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = ' Document Notes ', $Icon = 'ri  ri-sticky-note-2-fill') }}
            <table style="background-color: white !important;"
                class=" card-body mytable bg-light table table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr
                        class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Title </th>
                        <th>Description</th>
                        <th>View</th>

                    </tr>
                </thead>
                <tbody>
                    @isset($Docs)
                        @foreach ($Docs as $data)
                            <tr>

                                <td>{{ $data->Title }}</td>
                                <td>{{ $data->VeryBriefDescription }}</td>

                                <td>
                                    <a data-doc="  {{ $data->Course }} ({{ $data->VeryBriefDescription }})"
                                        data-source="{{ asset('assets/data/' . $data->CoursePresentation) }}"
                                        data-bs-toggle="modal" href="#FPdfJS"
                                        class="d-block PdfViewer btn-lg  text-light fw-bolder btn btn-success ms-3 p-1 px-2"><i
                                            class="   ri-questionnaire-fill

                                            text-light fw-bolder align-bottom me-1"></i>
                                        View Document</a>
                                </td>



                            </tr>
                        @endforeach
                    @endisset



                </tbody>
            </table>
        </div>
    </div>
