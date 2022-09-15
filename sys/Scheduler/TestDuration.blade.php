<div class="row">
    <div class="col-md-12">
        <!--begin::Card body-->
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            {!! Alert(
                $icon = 'fa-info',
                $class = 'alert-primary',
                $Title = 'Test Duration Settings',
                $Msg = 'Set  and manage test duration for all courses',
            ) !!}


        </div>
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">

            {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'Set Test Duration ', $Icon = 'fa-plus') }}



            <table
                class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr
                        class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Course </th>
                        <th>Test Type</th>
                        <th>Time in minutes for students to complete test
                        </th>

                        <th class="bg-danger fw-bolder text-light"> Delete
                        </th>






                    </tr>
                </thead>
                <tbody>
                    @isset($Duration)
                        @foreach ($Duration as $data)
                            <tr>

                                <td>{{ $data->Course }}</td>
                                <td>{{ $data->TestType }}</td>
                                <td>{{ $data->TestDurationInMinutes }}
                                </td>

                                <td>

                                    {!! ConfirmBtn(
                                        $data = [
                                            'msg' => 'You want to delete this record',
                                            'route' => route('DeleteDataWeb', [
                                                'id' => $data->id,
                                                'TableName' => 'exam_durations',
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


@include('Scheduler.NewDuration')
