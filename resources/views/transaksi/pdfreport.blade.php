<!DOCTYPE html>
<html>

<head>
    <title>Laporan Sistem Penitipan Motor Simpati</title>
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
                        <h4>{{ $date }}</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Motor</th>
                                    <th>Plat Nomor</th>
                                    <th>Jam Masuk</th>
                                    <th>Jenis Motor</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="row">Total</th>
                                    <td colspan="4">Rp.500.000</td>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->motor }}</td>
                                    <td>{{ $data->plat_nomor }}</td>
                                    <td>{{ $data->jam_masuk->format('d, M:H.i') }}</td>
                                    <td>{{ $data->jenis }}</td>
                                    <td>Rp. {{ $data->biaya }}</td>
                                    <td>{{ $data->tipe_pembayaran }}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>