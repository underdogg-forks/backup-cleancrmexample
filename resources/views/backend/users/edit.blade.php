@extends ('backend.layouts.app')

<?php
$module_name_singular = str_singular($module_name);
?>

@section ('title', __("labels.backend.$module_name.".strtolower($module_action).".title") . " - " . __("labels.backend.$module_name.".strtolower($module_action).".action"))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        <i class="{{$module_icon}}"></i> {{ __('labels.backend.users.edit.title') }}
                        <small class="text-muted">{{ __('labels.backend.users.edit.action') }} </small>
                    </h4>
                    <div class="small text-muted">
                        {{ __('labels.backend.users.edit.sub-title') }}
                    </div>
                </div>
                <!--/.col-->
                <div class="col-4">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <button onclick="window.history.back();" class="btn btn-warning ml-1" data-toggle="tooltip"
                                title="Return Back"><i class="fas fa-reply"></i></button>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
            <hr>
            <div class="row mt-4 mb-4">
                <div class="col">
                    {{ html()->modelForm($user, 'PATCH', route('backend.users.update', $user->id))->class('form-horizontal')->open() }}

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.users.fields.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.users.fields.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.users.fields.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.users.fields.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.users.fields.mobile'))->class('col-md-2 form-control-label')->for('mobile') }}

                        <div class="col-md-10">
                            {{ html()->text('mobile')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.users.fields.mobile'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.users.fields.password'))->class('col-md-2 form-control-label')->for('password') }}

                        <div class="col-md-10">
                            <a href="{{ route('backend.users.changePassword', $user->id) }}"
                               class="btn btn-outline-primary btn-sm">Change password</a>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-md-2">
                            {{ __('labels.backend.users.fields.social') }}
                        </div>
                        <div class="col-md-10">
                            <ul class="list-unstyled">
                                @foreach ($user->providers as $provider)
                                    <li>
                                        <i class="fab fa-{{ $provider->provider }}"></i> {{ label_case($provider->provider) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--form-group-->

                    <div class="row">
                        <div class="col">
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        @if ($roles->count())
                                            @foreach($roles as $role)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="checkbox">
                                                            {{ html()->label(html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)->id('role-'.$role->id) . ' ' . ucwords($role->name))->for('role-'.$role->id) }}
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @if ($role->id != 1)
                                                            @if ($role->permissions->count())
                                                                @foreach ($role->permissions as $permission)
                                                                    <i class="fa fa-dot-circle-o"></i> {{ ucwords($permission->name) }}
                                                                @endforeach
                                                            @else
                                                                None
                                                            @endif
                                                        @else
                                                            All Permissions
                                                        @endif
                                                    </div>
                                                </div><!--card-->
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if ($permissions->count())
                                            @foreach($permissions as $permission)
                                                <div class="checkbox">
                                                    {{ html()->label(html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)->id('permission-'.$permission->id) . ' ' . ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col">
                            {{ form_cancel(route('backend.users.index'), __('labels.buttons.general.cancel')) }}
                            {{ form_submit(__('labels.buttons.general.update')) }}
                        </div>
                    </div>
                    {{ html()->closeModelForm() }}
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        Updated: {{$user->updated_at->diffForHumans()}},
                        Created at: {{$user->created_at->toCookieString()}}
                    </small>
                </div>
            </div>
        </div>
    </div>

@endsection
