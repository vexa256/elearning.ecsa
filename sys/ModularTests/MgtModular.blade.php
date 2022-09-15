<div class="row">
    <div class="col-md-12">
        <!--begin::Card body-->
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            {!! Alert(
                $icon = 'fa-info',
                $class = 'alert-primary',
                $Title = $CourseName . ' Modular-Tests',
                $Msg = 'Manage all Modular-Tests attached to the selected course',
            ) !!}


        </div>
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">

            {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Modular-Test ', $Icon = 'fa-plus') }}



            <table
                class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr
                        class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Course </th>
                        <th>Modular-Test</th>
                        <th>Brief Description</th>

                        <th class="bg-danger fw-bolder text-light"> Delete
                        </th>






                    </tr>
                </thead>
                <tbody>
                    @isset($ModularTests)
                        @foreach ($ModularTests as $data)
                            <tr>

                                <td>{{ $CourseName }}</td>
                                <td>{{ $data->Title }}</td>
                                <td>{{ $data->VeryBriefDescription }}</td>



                                {{-- <td>{!! date('F j, Y', strtotime($data->created_at)) !!}</td> --}}





                                <td>

                                    {!! ConfirmBtn(
                                        $data = [
                                            'msg' => 'You want to delete this record',
                                            'route' => route('DeleteDataWeb', [
                                                'id' => $data->id,
                                                'TableName' => 'modular_tests',
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

@include('ModularTests.NewModular')
