@section('content')

    <div class="card custom-card" style="padding-bottom: 20px;">

        <h5 style="padding-left: 20px; padding-top: 5px;"><b>{{ title_case($admin->name) }} Profile</b></h5>
        <hr>
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" id="app">
            @csrf @method('PATCH')
            <div class="row container">
                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="email_phone" class="col-sm-4 col-form-label-sm">
                            * Name
                        </label>
                        <div class="col-sm-8">
                            <input type="text" value="{{ $admin->name }}" class="form-control form-control-sm" name="name" required>
                            @if($errors->has('name'))
                                <span class="invalid-error">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="name" class="col-sm-4 col-form-label-sm">
                            Email
                        </label>
                        <div class="col-sm-8">
                            <input type="text" value="{{ $admin->email }}" class="form-control form-control-sm" style="background: #E8EBEF !important;" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 35px;">
                        <label for="password" class="col-sm-4 col-form-label-sm">
                            Old Password
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-control-sm" name="old_password">
                            @if($errors->has('old_password'))
                                <span class="invalid-error">{{ $errors->first('old_password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="password" class="col-sm-4 col-form-label-sm">
                            New Password
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-control-sm" name="new_password">
                            @if($errors->has('new_password'))
                                <span class="invalid-error">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="confirm_password" class="col-sm-4 col-form-label-sm">
                            Confirm Password
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-control-sm" name="confirm_password">
                            @if($errors->has('confirm_password'))
                                <span class="invalid-error">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            {{--<div class="col-md-6 col-sm-12">--}}
            {{--<div class="container" style="margin-top: 20px;">--}}
            {{--<label for="photo" class="form-label col-form-label-sm">--}}
            {{--Photo | <b>Width 808px</b> | <b>Height 206</b>--}}
            {{--</label>--}}
            {{--<input type="file" class="form-control form-control-sm" name="photo" required>--}}
            {{--@if($errors->has('photo'))--}}
            {{--<span class="invalid-error">{{ $errors->first('photo') }}</span>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-6 col-sm-12">
                <div class="container" style="margin-top: 20px;">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </div>


        </form>
    </div>
@endsection

@push('script')


@endpush

