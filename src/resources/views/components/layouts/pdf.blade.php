<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ config('app.name', 'Recipes') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        }

        p, a {
            font-size: 0.8rem;
        }

        li {
            font-size: 0.75rem;
        }

        img {
            /* width: 300px; */
            height: 150px;
        }

        margin-bottom {
            margin-bottom: 0.8rem;
        }
    </style>

</head>
<body>
    <main class="text-secondary">
        {{ $slot }}
    </main>
</body>
</html>
