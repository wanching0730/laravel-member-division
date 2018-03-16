<?php
    use App\Common;
?>

@extends('layouts.app')

@section('content')

<div class="panel-heading"><a  class="pull-right btn btn-primary btn-sm" href="/member/create">
<i class="fa fa-plus-square" aria-hidden="true"></i>  Add New Member</a> </div>

</br>

<div class="panel-body">
    @if(count($members) > 0)
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Membership No.</th>
                        <th>IC</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Division</th>
                        <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($members as $i => $member)
                    <tr>
                        <td class="table-text">
                            <div>{{ $i+1 }}</div>
                        </td>
                        <td class="table-text">
                            <div>
                                {!! link_to_route(
                                    'division.show',
                                    $title = $member->membership_no,
                                    $parameters = [
                                        'id' => $member->id,
                                    ]
                                ) !!}
                            </div>
                        </td>
                        <td class="table-text">
                            <div>{{ $member->nric }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $member->name }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $member->gender }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $member->address }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ Common::$states[$member->state] }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $member->phone }}</div>
                        </td>
                        <td class="table-text">
                            <img src='/member/{{ $member->id }}/image'/></td>
                            <!-- <img src="data:image/jpeg;base64;{{$member->image}}"/> -->
                        </td>
                        <td class="table-text">
                            <div>{{ $member->division->name }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $member->created_at }}</div>
                        </td>
                        <td>
                            <li>
                                <a href="/member/edit/{{ $member->id }}"><i class="fas fa-edit"></i> Edit</a></li>
                            </li>
                            <li>
                                <a   
                                href="/member/{$member->id}"
                                    onclick="
                                    var result = confirm('Are you sure you wish to delete this member?');
                                        if( result ){
                                                event.preventDefault();
                                                document.getElementById('delete-form').submit();
                                        }
                                            "
                                            ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>

                                <form id="delete-form" action="{{ route('member.destroy',[$member->id]) }}" 
                                    method="POST" style="display: none;">
                                            <input type="hidden" name="_method" value="delete">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                        </td>
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
                                        
                                    

                         
