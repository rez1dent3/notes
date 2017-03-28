@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Note
                    </div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('note.store') }}">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Title</label>

                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="title"
                                           value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                <label for="text" class="col-md-2 control-label">Note</label>

                                <div class="col-md-10">
                                    <textarea id="text" class="form-control editor" name="text" rows="8"
                                              required>{{ old('text') }}</textarea>

                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                <label for="color" class="col-md-2 control-label">Color</label>

                                <div class="col-md-10">
                                    <select id="color" class="select2" name="color" style="width: 100%">
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" data-color="{{ $color->value }}">
                                                {{ $color->title }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('color'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fontAwesome') ? ' has-error' : '' }}">
                                <label for="fontAwesome" class="col-md-2 control-label">Font Awesome</label>

                                <div class="col-md-10">
                                    <select id="fontAwesome" class="select2" name="fontAwesome" style="width: 100%">
                                        @foreach($fontAwesomes as $fontAwesome)
                                            <option value="{{ $fontAwesome->id }}"
                                                    @if('circle-o' === $fontAwesome->value)
                                                    selected
                                                    @endif
                                                    data-icon="fa fa-{{ $fontAwesome->value }}">
                                                {{ $fontAwesome->value }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('fontAwesome'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fontAwesome') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('encrypted') ? ' has-error' : '' }}">
                                <label for="encrypted" class="col-md-2 control-label">Secure</label>

                                <div class="col-md-10">
                                    <div class="checkbox">
                                        <input id="encrypted" type="checkbox"  name="encrypted"
                                               @if (old('encrypted'))
                                                checked
                                               @endif
                                        />
                                    </div>

                                    @if ($errors->has('encrypted'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('encrypted') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('secret') ? ' has-error' : '' }}">
                                <label for="secret" class="col-md-2 control-label">Password</label>

                                <div class="col-md-10">
                                    <input id="secret" type="password" class="form-control" name="secret"
                                           value="{{ old('secret') }}" >

                                    @if ($errors->has('secret'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('secret') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
