@extends('admin.layouts.main')

@section('title', 'Common admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row card">
            <div class="col-6">
                <h4>This is common input</h4>
                <x-form-input title="Common input" type="text" name="common_input" class="form-control"></x-form-input>
                <hr>
                <h4>This is common select</h4>
            </div>
        </div>
    </div>
@endsection
