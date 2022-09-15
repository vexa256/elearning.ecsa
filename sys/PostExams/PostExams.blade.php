<div class="row">
    <div class="col-md-12">
        <!--begin::Card body-->
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            {!! Alert(
                $icon = 'fa-info',
                $class = 'alert-primary',
                $Title = $CourseName . ' Post-Test Question Bank',
                $Msg = 'Manage all questions attached to the selected course Post-Test ',
            ) !!}


        </div>
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">

            {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Question', $Icon = 'fa-plus') }}



            <table
                class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr
                        class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Course </th>
                        <th> Question</th>
                        {{-- <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th> --}}
                        <th>Correct Option</th>

                        <th class="bg-danger fw-bolder text-light"> Delete
                        </th>






                    </tr>
                </thead>
                <tbody>
                    @isset($Questions)
                        @foreach ($Questions as $data)
                            <tr>

                                <td>{{ $CourseName }}</td>

                                <td>

                                    <a data-bs-toggle="modal"
                                        href="#Desc{{ $data->id }}"
                                        class="btn btn-sm btn-danger">
                                        <i class="fas fa-binoculars"
                                            aria-hidden="true"></i>
                                    </a>

                                </td>
                                {{-- <td>{{ $data->QuestionOptionOne }}</td>
                                <td>{{ $data->QuestionOptionTwo }}</td>
                                <td>{{ $data->QuestionOptionThree }}</td>
                                <td>{{ $data->QuestionOptionFour }}</td> --}}
                                <td>{{ $data->CorrectAnswerOption }}</td>



                                {{-- <td>{!! date('F j, Y', strtotime($data->created_at)) !!}</td> --}}





                                <td>

                                    {!! ConfirmBtn(
                                        $data = [
                                            'msg' => 'You want to delete this record',
                                            'route' => route('DeleteDataWeb', [
                                                'id' => $data->id,
                                                'TableName' => 'exam_questions',
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

@include('PostExams.NewPostExam')

{{-- @include('scripts.fixjs') --}}

@isset($Questions)
    @include('viewer.viewer', [
        'PassedData' => $Questions,
        'Title' => 'View the selected  question',
        'DescriptionTableColumn' => 'Question',
    ])
@endisset
