@foreach($orders as $k => $order)
@if ($k == 0)
<tr class="">
    <td colspan="8" class="py-4 text-center">
        <strong>{{$order->getRaceNameForParticipantsList()}}</strong>
    </td>
</tr>
@endif
<tr>
    <th scope="row">{{ $k + 1 }}</th>
    <td>{{ $order->name }}</td>
    <td>{{ $order->city }}</td>
    <td>{{ $order->race_name }}</td>
    <td>{{ $order->id }}</td>
    <td>{{ $order->club }}</td>
    <td>{{ $order->formatDistance() }}</td>
    <td>{{ $order->displayTypeForParticipantsList() }}</td>
</tr>
@if(isset($orders[$k + 1]) && $order->type != $orders[$k+1]->type)
<tr>
    <td colspan="8" class="py-4 text-center">
        <strong>{{$orders[$k + 1]->getRaceNameForParticipantsList()}}</strong>
    </td>
</tr>
@endif
@endforeach
