<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100 py-10">
    <div class="container mx-auto max-w-md">
        <div class="bg-white p-6 rounded shadow-md">
            <h1 class="text-xl font-bold mb-4">Upload a File</h1>
            
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">Choose a file</label>
                    <input type="file" name="file" id="file" class="mt-1 block w-full">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>
