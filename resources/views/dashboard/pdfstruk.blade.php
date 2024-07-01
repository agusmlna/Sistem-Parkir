<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">

            <div class="col-12">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 text-center">
                        <h2>{{ $date }}</h2>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-4 pl-5 ml-5 py-3">
                            <h5>Nama Motor</h5>
                            <h5>Plat Nompor</h5>
                            <h5>Jam Masuk</h5>
                            <h5>Jenis Motor</h5>
                            <h5>Total Harga</h5>
                        </div>
                        <div class="col-4 pl-5 ml-5 py-3">
                            <h5>{{ $data->motor }}</h5>
                            <h5>{{ $data->plat_nomor }}</h5>
                            <h5>{{ $data->jam_masuk->format('H.i') }}</h5>
                            <h5>{{ $data->jenis }}</h5>
                            <h5>{{ $data->biaya }}</h5>
                        </div>
                    </div>
                    <div class="card-header py-3 text-center">
                        <h3 class="m-0 font-weight-bold text-primary">
                            Terima Kasih
                        </h3>
                        <h4>Penitipan motor simpati</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
