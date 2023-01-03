<table class="table">
    @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->product_name->description }} ...................................................... $ {{ $producto->valor }}</td>
        </tr>
    @endforeach  
</table>