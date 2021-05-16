<table>
    <thead>
        <tr>
            @foreach ($header as $jenis)
                <th><strong>{{ $jenis }}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $jenis)
            <tr>
                <td>{{ $jenis->KodeJenis }}</td>
                <td>{{ $jenis->KeteranganJenis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>