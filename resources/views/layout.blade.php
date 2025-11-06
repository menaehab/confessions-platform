{{-- layout.blade.php --}}
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>رسالة مجهولة</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body dir="rtl" class="m-0 p-0 gradient-bg min-h-screen">
    {{ $slot }}
</body>
</html>
