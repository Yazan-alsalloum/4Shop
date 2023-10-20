@extends('layouts.admin')

@section('content')

	<div class="d-flex justify-content-between align-items-center my-4">
		<h4>Bestellingen</h4>
		<div>
			<a href="{{ route('admin.orders.factory') }}" target="_blank">Bekijk overzicht voor producent &gt;</a><br />
			<a href="{{ route('admin.orders.mail') }}">Verstuur mails over ophalen &gt;</a><br />
			<a href="{{ route('admin.orders.packing') }}" target="_blank">Print pakbonnen &gt;</a>
		</div>

	</div>

	<table class="table table-striped table-hover">
		<tr>
			<th>#</th>
			<th>Naam</th>
			<th>Speltak</th>
			<th>Bedrag</th>
			<th>Betaling</th>
            <th>delivery</th>
            <th>delivery wijzigen</th>
		</tr>
		@foreach($orders as $order)
			<tr>
				<td>
					<a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->slug }}</a>
				</td>
				<td>{{ $order->name }}</td>
				<td>{{ ucfirst($order->speltak) }}</td>
				<td>&euro;{{ number_format($order->amount, 2) }}</td>
				<td>
					{!! $order->payed ? '<span class="badge badge-success">betaald</span>' : '<span class="badge badge-warning">niet betaald</span>' !!}
                    <td>
                        {!! $order->delivered ? '<span class="badge badge-success">geleverd</span>' : '<span class="badge badge-warning">niet geleverd</span>' !!}
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.toggle', $order) }}">Wijzig bezorgstatus</a>
                    </td>
                </td>
			</tr>
		@endforeach
	</table>
@endsection
