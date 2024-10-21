<!DOCTYPE html>
<html>
<head>
    <title>Import CSV</title>
</head>
<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('import.bkd') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="csv_file">Upload CSV File</label>
        <input type="file" name="csv_file" id="csv_file" required>
        <button type="submit">Import</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
