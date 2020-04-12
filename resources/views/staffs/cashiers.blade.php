@section('style')
    <!-- Styles for Datatable-->
    <link rel="stylesheet" href="/assets/css/datatables.css">

@endsection

@section('content')
    <div class="card custom-card">
        <div class="row">
            <div class="col-md-6 col-9">
                <h6 style="padding-left: 20px; padding-top: 5px;"><b>Cashiers</b>&nbsp;
                    <a href="{{ route('staffs.index') }}" style="padding: 2px 5px 2px 5px; font-size: 13px;" class="btn btn-outline-primary btn-sm">all</a>
                    <a href="{{ route('storekeepers.index') }}" style="padding: 2px 5px 2px 5px; font-size: 13px;" class="btn btn-outline-secondary btn-sm">storekeepers</a>
                    <a href="{{ route('gatekeepers.index') }}" style="padding: 2px 5px 2px 5px; font-size: 13px;" class="btn btn-outline-info btn-sm">gatekeepers</a>
                </h6>
            </div>
            <div class="col-md-6 col-3" align="right">
                <div class="container">
                    {{--<a href="{{ route('orders.delete_history') }}" class="btn btn-secondary btn-sm text-right">--}}
                    {{--<i class="fa fa-history"></i>--}}
                    {{--</a>--}}
                    &nbsp;
                    <a href="{{ route('staffs.create') }}" class="btn btn-success btn-sm text-right">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>
        <!-- /.row -->
        <div class="container">
            <span style=" padding: 3px 15px 3px 3px;">Search</span>
            <input style="" type="text" id="searchFilter">
            <br><br>
            <table class="table table-hover table-responsive-sm" style="padding: 0px; margin: 0px;" width="100%"
                   id="cashiers-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
            {{--</div>--}}


        </div>
    </div>
@endsection

@push('script')
    <script src="/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <script>

        $(function () {
            var t = $('#cashiers-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 50,
                "bLengthChange": false,
                ajax: '{{ route('cashiers.data') }}',
                columns: [
                    {data: 'photo', name: 'photo'},
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
    </script>
@endpush