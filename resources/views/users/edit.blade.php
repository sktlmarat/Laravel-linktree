@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">User Settings</h2>
                    <form action="/dashboard/settings" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="background_color">Background Color</label>
                                    <input type="text" id="background_color" name="background_color" class="form-control {{ $errors->first('background_color') ? 'is-invalid' : '' }}"
                                           placeholder="#ffffff" value="{{ $user ->background_color }}">
                                    @if($errors->first('background_color'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('background_color') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="text_color">Text Color</label>
                                    <input type="text" id="text_color" name="text_color" class="form-control {{ $errors->first('text_color') ? 'is-invalid' : '' }}"
                                           placeholder="#ffffff" value="{{ $user->text_color }}">
                                    @if($errors->first('text_color'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('text_color') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                @csrf
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
