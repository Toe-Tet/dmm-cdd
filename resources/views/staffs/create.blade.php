@section('style')

@endsection

@section('content')

    <div class="card custom-card" style="padding-bottom: 20px;">

        <h5 style="padding-left: 20px; padding-top: 5px;"><b>Staff Registration</b></h5>
        <hr>
        <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data" id="app">
            @csrf
            <div class="row container">

                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="email" class="col-sm-4 col-form-label-sm">
                            * Login Name
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="login_name" required>
                            @if($errors->has('login_name'))
                                <span class="invalid-error">{{ $errors->first('login_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="name" class="col-sm-4 col-form-label-sm">
                            * Full Name
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="full_name" required>
                            @if($errors->has('full_name'))
                                <span class="invalid-error">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row container">
                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="phone_no" class="col-sm-4 col-form-label-sm">
                            * Phone Number
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm number" name="phone_no" required>
                            @if($errors->has('phone_no'))
                                <span class="invalid-error">{{ $errors->first('phone_no') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="phone_no" class="col-sm-4 col-form-label-sm">
                            * Type
                        </label>
                        <div class="col-sm-8">
                            <select name="type" class="form-control form-control-sm" id="">
                                @foreach(config('staff.types') as $value => $type)
                                    <option value="{{ $value }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <span class="invalid-error">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="row container">
                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="phone_no" class="col-sm-4 col-form-label-sm">
                            Gate
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="gate">
                            @if($errors->has('gate'))
                                <span class="invalid-error">{{ $errors->first('gate') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="phone_no" class="col-sm-4 col-form-label-sm">
                            Photo
                        </label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control form-control-sm" name="photo">
                            @if($errors->has('photo'))
                                <span class="invalid-error">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="row container">
                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="address" class="col-sm-4 col-form-label-sm">
                            Address
                        </label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" name="address"></textarea>
                            @if($errors->has('address'))
                                <span class="invalid-error">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 35px;">
                        <label for="password" class="col-sm-4 col-form-label-sm">
                            * Password
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-control-sm" name="password" required>
                            @if($errors->has('password'))
                                <span class="invalid-error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="container form-group row" style="margin-top: 10px;">
                        <label for="confirm_password" class="col-sm-4 col-form-label-sm">
                            * Confirm Password
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-control-sm" name="confirm_password"
                                   required>
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
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>
            </div>


        </form>
    </div>
@endsection

@push('script')


@endpush
