<?php
    use App\Common;
?>

@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <table class="table table-stripped" border="1">
            <thead>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Membership No.</td>
                    <td>{{ $member->membership_no }}</td>
                </tr>
                <tr>
                    <td>IC Number</td>
                    <td>{{ $member->nric }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $member->name }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $member->gender }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{!!  nl2br($member->address) !!}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ Common::$states[$member->state] }}</td>
                </tr>
                <tr>
                    <td>Created</td>
                    <td>{{ $member->created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection