@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Balance</h1>
                    @if(isset($balance))
                           {{$balance}}
                    @endif

                    @if(isset($balance_error))
                        {{ __('Error on balance: ') }} {{$balance_error}}
                    @endif

                    <h1>History</h1>
                    @if(isset($histories))

                    <table style="width:100%">
                        <tr>
                            <th>Value</th>
                            <th>CreatedAt</th>
                        </tr>

                        @foreach ($histories as $history)
                            <tr>
                                <td>{{ $history['value'] }}</td>
                                <td>{{ $history['created_at'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                    @endif

                    @if(isset($history_error))
                        {{ __('Error on history: ') }} {{$history_error}}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
