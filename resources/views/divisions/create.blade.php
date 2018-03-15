<?php

use App\Common;

?>

@extends('layouts.app')

@section('content')

    <div class="row col-md-12 col-lg-12 col-sm-12">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <h1 align="center">Create New Division</h1>

        <div class="row  col-md-12 col-lg-12 col-sm-12">

            {!! Form::model($division, [
                'route' => ['division.store'],
                'class' => 'form-horizontal'])
            !!}

            <div class="form-group row">
                {!! Form::label('division-code', 'Code', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('code', null, [
                        'id' => 'division-code',
                        'class' => 'form-control',
                        'maxlength' => 3,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('division-name', 'Name', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('name', null, [
                        'id' => 'division-name',
                        'class' => 'form-control',
                        'maxlength' => 100,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('division-address', 'Address', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('address', null, [
                        'id' => 'division-address',
                        'class' => 'form-control'
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('division-postcode', 'Postcode', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('postcode', null, [
                        'id' => 'division-postcode',
                        'class' => 'form-control',
                        'maxlength' => 5,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('division-city', 'City', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::text('city', null, [
                        'id' => 'division-city',
                        'class' => 'form-control',
                        'maxlength' => 50,
                    ]) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('division-state', 'State', [
                    'class' => 'control-label col-sm-3',
                ]) !!}

                <div class="col-sm-9">
                    {!! Form::select('state', Common::$states, null, [
                        'class' => 'form-control',
                        'placeholder' => '- Select State -',
                    ]) !!}
                </div>
            </div>

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





