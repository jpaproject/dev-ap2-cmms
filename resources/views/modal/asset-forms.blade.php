<table class="table table-hover" id="table2">
    <thead>
        <tr>
            <th></th>
            <th>No</th>
            <th>Form Name</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($assetForms as $assetForm)
            <tr>
                <td>{{ $assetForm->form_id }}</td>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $assetForm->form->name }}
                    {{-- <a href="{{ asset('docs/'.$assetForm->filename) }}" target="_blank">
                    {{ Str::limit($assetForm->filename ?? "N/A", 45, '...') }}
                </a>  --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script></script>
