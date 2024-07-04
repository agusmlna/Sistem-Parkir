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
                            <tbody>
                                @php
                                    $i = 1;
                                    $total = 0;
                                @endphp
                                @foreach ($data as $d)
                                    @php
                                        $total += $d->biaya;
                                    @endphp
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $d->motor }}</td>
                                        <td>{{ $d->plat_nomor }}</td>
                                        <td>{{ $d->jam_masuk->format('d, M:H.i') }}</td>
                                        <td>{{ $d->jenis }}</td>
                                        <td>Rp. {{ $d->biaya }}</td>
                                        <td>{{ $d->tipe_pembayaran }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="row">Total</th>
                                    <td colspan="4">Rp.{{ $total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
