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
    <div class="container-fluid pt-4">
        <div class="card p-4">
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
            </div>
        </div>
    </div>
@endsection
