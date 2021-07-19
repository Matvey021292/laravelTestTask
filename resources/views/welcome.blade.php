@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if($orders->isNotEmpty())
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th>{{$order->id}}</th>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <div class="col-md-12">
            <form id="formOrder" action="{{route('order')}}">
                <div class="text-center my-5">
                    <button class="btn-lg btn btn-primary" data-status="success">Success Request</button>
                    <button class="btn-lg btn btn-danger" data-status="declined">Fail Request</button>
                </div>
                <div class="my-5">
                    <pre class="code" id="code" contenteditable="true">
{
  "pay_form": {
    "token": "xxx",
    "design_name": "des1"
  },
  "transactions": {
    "12345-7891234567": {
      "id": "12345-7891234567",
      "operation": "pay",
      "status": "fail",
      "descriptor": "FAKE_PSP",
      "amount": 2345,
      "currency": "USD",
      "fee": {
        "amount": 0,
        "currency": "USD"
      },
      "card": {
        "bank": "CITIZENS STATE BANK"
      }
    }
  },
  "error": {
    "code": "6.01",
    "messages": [
      "Unknown decline code"
    ],
    "recommended_message_for_user": "Unknown decline code"
  },
  "order": {
    "order_id": "12345-7891234567",
    "status": "declined",
    "amount": 2345,
    "refunded_amount": 0,
    "currency": "USD",
    "marketing_amount": 2345,
    "marketing_currency": "USD",
    "processing_amount": 2345,
    "processing_currency": "USD",
    "descriptor": "FAKE_PSP",
    "fraudulent": false,
    "total_fee_amount": 0,
    "fee_currency": "USD"
  },
  "transaction": {
    "id": "12345-7891234567",
    "operation": "pay",
    "status": "fail"
  }
}
                    </pre>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
