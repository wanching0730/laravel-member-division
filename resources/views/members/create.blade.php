<?php

use App\Common;

?>

@extends('layouts.app')

@section('content')

    <div class="row col-md-12 col-lg-12 col-sm-12">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <h1 align="center">Create New Member</h1>

        <div class="row  col-md-12 col-lg-12 col-sm-12">

            {!! Form::model($member, [
                'route' => ['member.store'],
                'class' => 'form-horizontal'])
            !!}

            <div class="form-group row">
                {!! Form::label('member-no', 'Membership No.', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('membership_no', null, [
                        'id' => 'member-membership_no',
                        'class' => 'form-control',
                        'maxlength' => 10,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('member-nric', 'IC', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('nric', null, [
                        'id' => 'member-nric',
                        'class' => 'form-control',
                        'maxlength' => 12,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('member-name', 'Name', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('name', null, [
                        'id' => 'member-name',
                        'class' => 'form-control',
                        'maxlength' => 12,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('member-gender', 'Gender', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('gender', null, [
                        'id' => 'member-gender',
                        'class' => 'form-control',
                        'maxlength' => 1,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('member-address', 'Address', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('address', null, [
                        'id' => 'member-address',
                        'class' => 'form-control'
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('member-phone', 'Phone', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('phone', null, [
                        'id' => 'member-phone',
                        'class' => 'form-control',
                        'maxlength' => 11,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('member-state', 'State', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::select('state', Common::$states, null, [
                        'class' => 'form-control',
                        'placeholder' => '- Select State -',
                    ]) !!}
                </div>
            </div>

            @if($divisions != null)
                <div class="form-group row">
                    <div class="control-label col-sm-3">
                        <label for="doctor_id">Division Name</label>
                    </div>

                    <div class="col-sm-9">
                        <select name="division_id" class="form-control" placeholder="- Select Division -"> 

                            @foreach($divisions as $division)
                                <option value="{{$division->id}}"> {{$division->name}} </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            @endif
            
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::button('Save', [
                        'type' => 'submit',
                        'class' => 'btn btn-primary',
                    ]) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
