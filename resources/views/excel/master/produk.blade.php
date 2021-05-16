<table>
    <thead>
        <tr>
            @foreach ($header as $produk)
                <th><strong>{{ $produk }}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $produk)
            <tr>
                <td>{{ $produk->KodeProduk }}</td>
                <td>{{ $produk->InisialProduk }}</td>
                <td>{{ $produk->KeteranganProduk }}</td>
            </tr>
        @endforeach
    </tbody>
</table>