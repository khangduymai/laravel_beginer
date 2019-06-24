@extends('time_tracking.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>Check Out</h1>


            <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Login at</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $index => $user) 
                    @php 
                        $dateTime = new \DateTime();
                        $dateTime->setTimestamp($user->timeTrackings->first()->time_in); 
                        $loginTime = $dateTime->format('M d, Y H:i:s');
                    @endphp

                     <tr>
                        <th scope="row">{{ $index + 1}}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $loginTime }}</td>
                        <td> 
                            <form method="POST" action="{{ route('check-out', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                        Check Out
                                </button>
                            </form>
                        </td>
                     </tr>     
                @endforeach
            
            </tbody>
            </table>            
        </div>
    </div>
</div>
@endsection