<table>
    <thead>
        <tr>
            @foreach ($header as $merk)
                <th><strong>{{ $merk }}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $merk)
            <tr>
                <td>{{ $merk->KodeMerk }}</td>
                <td>{{ $merk->KeteranganMerk }}</td>
            </tr>
        @endforeach
    </tbody>
</table>