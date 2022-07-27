@extends('layouts.administration_layout')

@section('header_title', ucfirst(request()->type) . ' members')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Last name</th>
                        <th scope="col">First name</th>
                        <th scope="col">Middle name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member['lastname'] }}</td>
                            <td>{{ $member['firstname'] }}</td>
                            <td>{{ $member['middlename'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
