<?php
    use App\Common;
?>

@extends('layouts.app')

@section('content')

@if(Auth::check())
    <div class="panel-heading"><a  class="pull-right btn btn-primary btn-sm" href="/division/create">
    <i class="fa fa-plus-square" aria-hidden="true"></i>  Add New Division</a> </div>
@endif

</br>

<div class="panel-body">
    @if(count($divisions) > 0)
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Members</th>
                    <th>Created</th>
                    @if(Auth::check())
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach($divisions as $i => $division)
                    <tr>
                        <td class="table-text">
                            <div>{{ $i+1 }}</div>
                        </td>
                        <td class="table-text">
                            <div>
                                {!! link_to_route(
                                    'division.show',
                                    $title = $division->code,
                                    $parameters = [
                                        'id' => $division->id,
                                    ]
                                ) !!}
                            </div>
                        </td>
                        <td class="table-text">
                            <div>{{ $division->name }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $division->address }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $division->city }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ Common::$states[$division->state] }}</div>
                        </td>
                        <td>
                            @if($division->members != null)
                                @foreach($division->members as $member) 
                                    <li>{{ $member->name }}</li>                            
                                @endforeach
                            @elseif($division->members == null)
                                <li>Null</li>
                            @endif
                        </td>
                        <td class="table-text">
                            <div>{{ $division->created_at }}</div>
                        </td>
                        @if(Auth::check())
                            <td>
                                <li>
                                    <a href="/division/edit/{{ $division->id }}"><i class="fas fa-edit"></i> Edit</a></li>
                                </li>
                                <li>
                                    <a   
                                    href="/division/{$division->id}"
                                        onclick="
                                        var result = confirm('Are you sure you wish to delete this division?');
                                            if( result ){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form').submit();
                                            }
                                                "
                                                ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>

                                    <form id="delete-form" action="{{ route('division.destroy',[$division->id]) }}" 
                                        method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="delete">
                                                {{ csrf_field() }}
                                    </form>
                                </li>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div>
            No records found
        </div>
    @endif
</div>

@endsection
                                        
                                    

                         
