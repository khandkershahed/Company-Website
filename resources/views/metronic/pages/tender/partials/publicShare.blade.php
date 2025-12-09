<!DOCTYPE html>
<html>

<head>
    <title>Tender Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h4 class="mb-0">{{ $tender->title }}</h4>
            </div>

            <div class="card-body">
                @include('metronic.pages.tender.partials.show')
            </div>
        </div>
    </div>

</body>

</html>
