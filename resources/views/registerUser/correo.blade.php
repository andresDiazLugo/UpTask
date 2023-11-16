<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noticia+Text:wght@700&display=swap" rel="stylesheet">
    <title>{{ $title ?? 'My manager tasks' }}</title>

</head>

<body style=" font-family: 'Playpen Sans' ">
    <div style="width: 95%; max-width: 800px; margin: 0 auto; text-align:center">
        <h1 style="font-size: 7rem; font-weight: 900; text-align: center; color: #0da6f3;">
            UpTask
        </h1>
        <p
            style="
        font-weight: 900;
        color: black;
        font-size: 2.8rem;
        text-align: center;
        ">
            Create and manager you Proyects</p>
        <div style="container-sm">
            <p style="
            font-size: 2rem;
            color: #5f5f5f;
            line-height: 1.8;">
                {{ $content }}</p>
            <div style="actions">
                <a href="{{ route($link, ['token' => $token]) }}" style="color:#0da6f3" href="/#">Click aqui</a>
            </div>
        </div>
    </div>
</body>

</html>
