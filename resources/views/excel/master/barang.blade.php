<table>
    <thead>
        <tr>
            @foreach ($header as $barang)
                <th><strong>{{ $barang }}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $barang)
            <tr>
                <td>{{ $barang->KodeBarang }}</td>
                <td>{{ $barang->KodeProduk }}</td>
                <td>{{ $barang->NamaBarang }}</td>
                <td>{{ $barang->KodeMerk }}</td>
                <td>{{ $barang->KodeJenis }}</td>
                <td>{{ $barang->KodeUkuran }}</td>
                <td>{{ $barang->KodeModelSatuan }}</td>
                <td>{{ $barang->SatuanColi }}</td>
                <td>{{ $barang->DiscGroupBarang }}</td>
                <td>{{ $barang->ProdukGroup }}</td>
            </tr>
        @endforeach
    </tbody>
</table>