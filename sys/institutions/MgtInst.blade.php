<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Let\'s manage supported institutions.',
        $Msg = 'Add, remove and edit  the suppoerted  institutions',
    ) !!}
</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Institution', $Icon = 'fa-plus') }}
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Institution</th>
                <th>Description</th>
                <th>Date Added</th>
                <th class="bg-dark text-light"> Update </th>
                <th class="bg-danger fw-bolder text-light"> Delete </th>



            </tr>
        </thead>
        <tbody>
            @isset($Institutions)
                @foreach ($Institutions as $data)
                    <tr>

                        <td>{{ $data->Title }}</td>
                        <td>{{ $data->VeryBriefDescription }}</td>



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
                                        'TableName' => 'institutions',
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

<input type="text" name="" id="NewInst" class="d-none">
<!--end::Card body-->
@include('institutions.NewInst')

{{-- @isset($Institutions)
    @include('viewer.viewer', [
        'PassedData' => $Institutions,
        'Title' => 'View the Description of the selected course',
        'DescriptionTableColumn' => 'CourseDescription',
    ])
@endisset --}}


@isset($Institutions)
    @foreach ($Institutions as $data)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $data->id) }}
        <form id="FormUpdateData" action="{{ route('MassUpdate') }}" class=""
            method="POST">
            @csrf

            <div class="row">

                <input type="hidden" name="id" value="{{ $data->id }}">

                <input type="hidden" name="TableName" value="institutions">

                {{ RunUpdateModalFinal($ModalID = $data->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $data->id, $col = '12', $te = '12', $TableName = 'institutions') }}
            </div>


            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset


@include('scripts.fixjs')
