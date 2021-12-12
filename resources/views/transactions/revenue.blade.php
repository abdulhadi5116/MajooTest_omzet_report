@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Transaction') }}</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Merchant</th>
                                        @if($include_outlet)
                                            <th>Outlet</th>
                                        @endif
                                        <th scope="col">Omzet (Harian)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $key=>$transaction)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $transaction->created_date }}</td>
                                        @if(isset($transaction->merchant))
                                            <td>{{ $transaction->merchant->merchant_name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        @if($include_outlet && isset($transaction->outlet))
                                            <td>{{ $transaction->outlet->outlet_name }}</td>
                                        @elseif($include_outlet)
                                            <td></td>
                                        @endif
                                        <td>{{ $transaction->revenue }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                <div class="mx-auto">
                                        {{ $transactions->appends($_GET)->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
