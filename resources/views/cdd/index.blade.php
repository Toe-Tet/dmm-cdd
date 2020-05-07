@section('style')
    <!-- Styles for Datatable-->
    <link rel="stylesheet" href="{{ asset('/assets/css/datatables.css') }}">

@endsection

@section('content')
    <div class="card custom-card">
        <div class="row">
            <div class="col-md-6 col-9">
                <h6 style="padding-left: 20px; padding-top: 5px;">
                    <b>Customer Due Diligence</b>
                </h6>
                {{-- <h6 style="padding-left: 20px; padding-top: 5px;"><b>Staffs</b>&emsp;
                    <a href="{{ route('cashiers.index') }}" style="padding: 2px 5px 2px 5px; font-size: 13px;" class="btn btn-outline-primary btn-sm">cashiers</a>
                    <a href="{{ route('storekeepers.index') }}" style="padding: 2px 5px 2px 5px; font-size: 13px;" class="btn btn-outline-secondary btn-sm">storekeepers</a>
                    <a href="{{ route('gatekeepers.index') }}" style="padding: 2px 5px 2px 5px; font-size: 13px;" class="btn btn-outline-info btn-sm">gatekeepers</a>
                </h6> --}}
            </div>
            <div class="col-md-6 col-3" align="right">
                <div class="container">
                    {{--<a href="{{ route('orders.delete_history') }}" class="btn btn-secondary btn-sm text-right">--}}
                    {{--<i class="fa fa-history"></i>--}}
                    {{--</a>--}}
                    &nbsp;
                    {{-- <a href="{{ route('staffs.create') }}" class="btn btn-success btn-sm text-right">
                        <i class="fa fa-plus"></i>
                    </a> --}}
                </div>
            </div>
        </div>

        <hr>
        <!-- /.row -->
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('cdd.index') }}" method="GET">
                        @csrf 
                    <input style="padding-left: 10px;" type="text" value="{{ $keyword }}" placeholder="name, email, phone, nrc" name="keyword" id="searchFilter">
                    <button class="btn btn-outline-primary btn-sm mx-3 px-3" style="border-radius: 50px;" type="submit">Search</button>
                    <a href="{{ route('cdd.index') }}" class="btn btn-outline-info btn-sm px-3" style="border-radius: 50px;">Reset</a>
                    </form>
                    <br>
                </div>
                <div class="col-6 text-right">
                    <p class="px-3 pb-3 pt-1" style="color: gray;">Showing {{ $paginate['from'] }} to {{ $paginate['to'] }} of {{ $paginate['total'] }} entries</p>
                </div>
            </div>
            <table class="table table-hover table-responsive-sm" style="padding: 0px; margin: 0px;" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Action</th>
                </tr>
                </thead>
                @if(empty($cdds))
                    <tr>
                        <td colspan="6" align="center">
                            No Data
                        </td>
                    </tr>
                    @else
                    @php
                    if(isset($paginate)){
                        $n = (($paginate['current_page'] * $paginate['per_page']) - $paginate['per_page']) + 1;
                    } else {
                        $n = 1;
                    }
                    @endphp
                    @foreach($cdds as $user)

                    <tr class="colorchange">
                        <td>{{ $n }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{!! (!$user['email'] || $user['email'] == "") ? '<span class="badge badge-light text-italic">none</span>' : $user['email'] !!}</td>
                        <td>{{ $user['phone'] }}</td>
                        {{-- <td>{{ \Carbon\Carbon::parse($user['transaction_date'])->format('d/m/Y h:i A') }}</td> --}}
                        <td>
                            <span class="btn-group">
                                <div>
                                    <a href="#" class="btn btn-light waves-effect" data-toggle="modal" data-target="#modalCddShow{{ $user['id'] }}"><i class="fa fa-eye"></i></a>

                                    @include('cdd.show')
                                </div>
                           </span>
                       </td>
                    </tr>
                    @php $n++ @endphp
                    @endforeach
                @endif
            </table>
        </div>
        <div class="container row">
            @if(isset($paginate))
            <div class="col-12 pt-3">
                <ul class="pagination justify-content-center">
                    <li class="paginate_button page-item previous {{ $paginate['current_page'] == 1 ? 'disabled' : '' }}">
                        <a href="{{ route('cdd.index') }}?page=1" aria-controls="m_table_1" data-dt-idx="3"
                            tabindex="0" class="page-link">
                            <i class="fa fa-angle-double-left" style="font-size: 10px;"></i>
                        </a>
                    </li>
                    <li class="paginate_button page-item previous {{ $paginate['current_page'] - 1 <= 0 ? 'disabled' : '' }}">
                        <a href="{{ route('cdd.index').'?page='.($paginate['current_page'] - 1) }}"
                            aria-controls="m_table_1" data-dt-idx="3" tabindex="0" class="page-link">
                            <i class="fa fa-angle-left" style="font-size: 10px;"></i>
                        </a>
                    </li>
                    @if($paginate['total_page'] <= 20)
                    @for($i = 1;  $i <= $paginate['total_page']; $i++)
                    <li class="paginate_button page-item {{ $paginate['current_page'] == $i ? 'active' : '' }}">
                        <a href="{{ route('cdd.index').'?page='.$i }}" aria-controls="m_table_1"
                            data-dt-idx="3" tabindex="0" class="page-link">
                            {{ $i }}
                        </a>
                    </li>
                    @endfor
                    @elseif($paginate['current_page'] <= 6)
                        @for($i = 1;  $i <= $paginate['total_page']; $i++)
                        @if($i <= $paginate['current_page'] + 1)
                        <li class="paginate_button page-item {{ $paginate['current_page'] == $i ? 'active' : '' }}">
                            <a href="{{ route('cdd.index').'?page='.$i }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ $i }}
                            </a>
                        </li>
                        @endif
                        @endfor
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page='.($paginate['total_page'] - 1) }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ $paginate['total_page'] - 1 }}
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page='.$paginate['total_page'] }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ $paginate['total_page'] }}
                            </a>
                        </li>
                    @elseif($paginate['current_page'] >= $paginate['total_page'] - 5)
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page=1' }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ 1 }}
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page=2' }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ 2 }}
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        @for($i = ($paginate['current_page'] - 1);  $i <= $paginate['total_page']; $i++)
                        <li class="paginate_button page-item {{ $paginate['current_page'] == $i ? 'active' : '' }}">
                            <a href="{{ route('cdd.index').'?page='.$i }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor
                    @else
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page=1' }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ 1 }}
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page=2' }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ 2 }}
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        @for($i = ($paginate['current_page'] - 1);  $i <= ($paginate['current_page'] + 1); $i++)
                        <li class="paginate_button page-item {{ $paginate['current_page'] == $i ? 'active' : '' }}">
                            <a href="{{ route('cdd.index').'?page='.$i }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="#" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                .
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page='.($paginate['total_page'] - 1) }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ $paginate['total_page'] - 1 }}
                            </a>
                        </li>
                        <li class="paginate_button page-item">
                            <a href="{{ route('cdd.index').'?page='.$paginate['total_page'] }}" aria-controls="m_table_1"
                                data-dt-idx="3" tabindex="0" class="page-link">
                                {{ $paginate['total_page'] }}
                            </a>
                        </li>
                    @endif
                    <li class="paginate_button page-item next {{ $paginate['current_page'] + 1 > $paginate['total_page'] ? 'disabled' : '' }}">
                        <a href="{{ route('cdd.index').'?page='.($paginate['current_page'] + 1) }}"
                            aria-controls="m_table_1" data-dt-idx="3" tabindex="0" class="page-link">
                            <i class="fa fa-angle-right" style="font-size: 10px;"></i>
                        </a>
                    </li>
                    <li class="paginate_button page-item next {{ $paginate['current_page'] == $paginate['total_page'] ? 'disabled' : '' }}">
                        <a href="{{ route('cdd.index').'?page='.$paginate['total_page'] }}"
                            aria-controls="m_table_1" data-dt-idx="3" tabindex="0" class="page-link">
                            <i class="fa fa-angle-double-right" style="font-size: 10px;"></i>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
    </div>
@endsection

@push('script')
    {{-- <script src="/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables/dataTables.bootstrap4.min.js"></script> --}}

    {{-- <script>

        $(function () {
            var t = $('#staffs-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 50,
                "bLengthChange": false,
                ajax: '{{ route('staffs.data') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {
                        data: 'id', name: 'id',
                        render: function (data) {
                            return 'S' + data;
                        }
                    },
                    {
                        data: 'photo', name: 'photo',
                        render: function (data) {
                            if (data) {
                                return "<img src='/" + data + "' width='50px' height='50px'>";
                            }
                            return "<img src='/assets/images/default/staff_profile.png' width='50px' height='60px'>";
                        }
                    },
                    {data: 'full_name', name: 'full_name'},
                    {data: 'phone_no', name: 'phone_no'},
                    {
                        data: 'type', name: 'type',
                        render: function (data) {
                            if (data == 'cashier') {
                                return "<span class=\"badge badge-primary\">" + data + "</span>";
                            } else if (data == 'gatekeeper') {
                                return "<span class=\"badge badge-info\">" + data + "</span>";
                            } else {
                                return "<span class=\"badge badge-secondary\">" + data + "</span>";
                            }
                        }
                    },
                    // { data: 'is_top', name: 'is_top'},
                    // { data: 'is_top', name: 'is_top',
                    //     render: function(data){
                    //         if(data === "100"){
                    //             return "<h5><span class=\"badge badge-secondary\">Normal</span></h5>";
                    //         } else {
                    //             return "<h5><span class=\"badge badge-success\">Top "+data+"</span></h5>";
                    //         }
                    //     }
                    // },
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ],
                order: [[1, 'desc']]
            });

            $('#searchFilter').on('keyup', function () {
                t.search(this.value).draw();
            });

            $('#searchFilter').on('keyup', function () {
                t.search(this.value).draw();
            });

            t.on('order.dt search.dt', function () {
                t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script> --}}
@endpush