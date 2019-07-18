@extends('layouts.app')

@section('content-title', 'ایجاد پرسشگر')

@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ویرایش کاربر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('questioners.update', ['id' => $questioner->id])}}" method="POST" role="form">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2" for="name">نام</label>
                            <input  type="text" name="name" class="form-control col-sm-10" id="name" value="{{ $questioner->name }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="mobile">موبایل</label>
                            <input  type="mobile" name="mobile" class="form-control col-sm-10" id="mobile" value="{{ $questioner->mobile }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="type">نوع کاربر</label>
                            <select name="type" class="form-control col-sm-10" id="type">
                                <option value="admin" {{ $questioner->type== 'admin' ? 'selected' : '' }}>ادمین</option>
                                <option value="questioner" {{ $questioner->type == 'questioner' ? 'selected' : '' }}>پرسشگر</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="password">کلمه عبور</label>
                            <input type="password" name="password" class="form-control col-sm-10" id="password">
                        </div>
                    </div>
                <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary col-sm-2 pull-left">ارسال</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection