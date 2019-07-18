@extends('layouts.app')

@section('content-title', 'پرسشگران')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست پرسشگران</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>موبایل</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <a href="{{ route('questioners.show', ['id' => $user->id]) }}">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('questioners.edit', ['id' => $user->id]) }}">
                                        <i class="fa fa-pencil pl-3"></i>
                                    </a>
                                    <a href="{{ route('questioners.delete', ['id' => $user->id]) }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{ route('questioners.check', ['id' => $user->id]) }}">
                                        <i class="fa fa-{{ $user->status == active ? 'check' : 'times'}}"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script>
        console.log('s');
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
            });
            $('#example2').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
            "info" : false,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "autoWidth": false
            });
        });
    </script>
@endsection