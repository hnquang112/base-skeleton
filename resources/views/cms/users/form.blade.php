@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <form action="{{ $user->id ? route('cms.users.update', $user->id) : route('cms.users.store') }}"
                          method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ $user->id ? method_field('PUT') : '' }}
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name (*):</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="John Doe"
                                    name="display_name" value="{{ old('display_name') ?: $user->display_name }}">
                                @if ($errors->has('display_name'))
                                    <span class="help-block"><strong>{{ $errors->first('display_name') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email (*):</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="john.doe@gmail.com"
                                    name="email" value="{{ old('email') ?: $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRole" class="col-sm-2 control-label">Role:</label>

                            <div class="col-sm-10">
                                @if ($user->id)
                                    <label for="inputRole" class="control-label">{{ $user->role_name }}</label>
                                @else
                                    <select name="type" id="inputRole" class="form-control">
                                        @foreach (App\User::getRolesByAuthUser() as $key => $role)
                                            <option value="{{ $key }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block"><strong>{{ $errors->first('type') }}</strong></span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRole" class="col-sm-2 control-label">Username (*):</label>

                            <div class="col-sm-10">
                                @if ($user->id)
                                    <label for="inputUsername" class="control-label">{{ $user->username }}</label>
                                @else
                                    <input type="text" class="form-control" id="inputUsername" placeholder="john.doe"
                                           name="username" value="{{ old('username') }}">
                                    @if ($errors->has('username'))
                                        <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Password (*):</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" placeholder="password"
                                    name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordConfirm" class="col-sm-2 control-label">Password confirm (*):</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="password"
                                    name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->

        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-info">
                <div class="box-body box-profile">
                    <p>User's profile image is powered by <a href="http://gravatar.com" target="_blank">Gravatar</a></p>
                    <img class="profile-user-img img-responsive img-circle" src="{{ $user->avatar_image }}"
                         style="height: 100px">

                    {{--<h3 class="profile-username text-center">Nina Mcintire</h3>--}}

                    {{--<p class="text-muted text-center">Software Engineer</p>--}}

                    {{--<ul class="list-group list-group-unbordered">--}}
                    {{--<li class="list-group-item">--}}
                    {{--<b>Followers</b> <a class="pull-right">1,322</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                    {{--<b>Following</b> <a class="pull-right">543</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                    {{--<b>Friends</b> <a class="pull-right">13,287</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div>
@endsection