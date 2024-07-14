<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h2>{{ $date }}</h2>
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">
                        <h5>Nama Motor</h5>
                    </th>
                    <th scope="col">
                        <h5>Plat Nomor</h5>
                    </th>
                    <th scope="col">
                        <h5>Jam Masuk</h5>
                    </th>
                    <th scope="col">
                        <h5>Jenis Motor</h5>
                    </th>
                    <th scope="col">
                        <h5>Total Harga</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>{{ $data->motor }}</p>
                    </td>
                    <td>
                        <p>{{ $data->plat_nomor }}</p>
                    </td>
                    <td>
                        <p>{{ $data->jam_masuk->format('H.i') }}</p>
                    </td>
                    <td>
                        <p>{{ $data->jenis }}</p>
                    </td>
                    <td>
                        <p>{{ $data->biaya }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="card-header py-3 text-center">
            <h3 class="m-0 font-weight-bold text-primary">
                Terima Kasih
            </h3>
            <h4>Penitipan motor simpati</h4>
        </div>
    </div>

</body>

</html>
