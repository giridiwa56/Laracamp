@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 pt-3">
            <div class="card">
                <div class="card-header">
                    My Camps
                </div>
                <div class="card-body">
                    @include('components.alert')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Camp</th>
                                <th>Price</th>
                                <th>Register Data</th>
                                <th>Paid Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($checkouts as $checkout )
                            <tr>
                                <td>{{$checkout->User->name}}</td>                                
                                <td>{{$checkout->Camp->title}}</td>                                
                                <td>{{$checkout->Camp->price}}K</td>
                                <td>{{$checkout->created_at->format('M d Y')}}</td>
                                <td>
                                    @if ($checkout->is_paid)
                                        <span class="badge bg-success">Paid</span>    
                                    @else
                                        <span class="badge bg-warning">Waiting</span>                                            
                                    @endif
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <button class="btn btn-primary btn-sm">Set To Paid</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Camps Register</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection