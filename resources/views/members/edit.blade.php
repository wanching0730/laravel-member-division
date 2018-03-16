<?php

use App\Common;

?>

@extends('layouts.app')

@section('content')

<div class="panel-body">

    {!! Form::model($member, [
        'route' => ['member.update', $member->id],
        'class' => 'form-horizontal'])
    !!}

    <div class="form-group row">
        {!! Form::label('member-no', 'Membership No.', [
            'class' => 'control-label col-sm-3',
        ]) !!}

        <div class="col-sm-9">
            {!! Form::text('membership_no', $member->membership_no, [
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
            {!! Form::text('nric', $member->nric, [
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
            {!! Form::text('name', $member->name, [
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
            {!! Form::text('gender', $member->gender, [
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
            {!! Form::text('address', $member->address, [
                'id' => 'member-address',
                'class' => 'form-control'
            ]) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('member-state', 'State', [
            'class' => 'control-label col-sm-3',
        ]) !!}

        <div class="col-sm-9">
            {!! Form::select('state', Common::$states, $member->state, [
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

@endsection
