@extends('admin.layouts.main')

@section('title', 'Common admin')

@section('content')
    @php
        $options = [
            'option 1',
            'option 2',
            'option 3',
            'option 4',
        ];
    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Common form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-primary">Common input</h3>
                                    <x-admin.form-input for="input_one" name="input_one" title="Title common input"></x-admin.form-input>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-primary">Common select single</h3>
                                    <x-admin.form-select for="select_one" name="select_one" title="Title common select single">
                                        @foreach($options as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </x-admin.form-select>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-primary">Common select multiple</h3>
                                    <x-admin.form-select for="select_multiple" name="select_multiple" title="Title common select multiple" multiple>
                                        @foreach($options as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </x-admin.form-select>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-primary">Common input tag</h3>
                                    <x-admin.form-input-tag for="input_tag" name="input_tag" title="Title common input tag" value="default 1, default 2, default 3"></x-admin.form-input-tag>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-primary">Common input checkbox and radio</h3>
                                    <x-admin.form-input-check for="input_checkbox" name="input_checkbox" title="Title common input checkbox" value="1"></x-admin.form-input-check>
                                    <x-admin.form-input-check type="radio" for="input_checkbox" name="input_checkbox" title="Title common input radio" value="1"></x-admin.form-input-check>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-primary">Common input switch</h3>
                                    <x-admin.form-switch for="input_switch" name="input_switch" title="Input switch" value="1"></x-admin.form-switch>
                                </div>
                                <div class="col-lg-12">
                                    <h3 class="text-primary">Common textarea</h3>
                                    <x-admin.form-textarea for="textarea" name="textarea" title="Input textarea" value="This is textarea"></x-admin.form-textarea>
                                </div>
                                <div class="col-lg-12">
                                    <h3 class="text-primary">Common editor</h3>
                                    <x-admin.form-editor for="editor" name="editor" title="Input editor" value="This is editor"></x-admin.form-editor>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
