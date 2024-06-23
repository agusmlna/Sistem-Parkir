<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
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
                                <h3 class="m-0 font-weight-bold text-primary">
                                    Transaksi : 1
                                </h3>
                                <h4>Minggu, 24/06/2024</h4>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-4 pl-5 ml-5 py-3">
                                <h5>Nama Motor</h5>
                                <h5>Plat Nompor</h5>
                                <h5>Jam Masuk</h5>
                                <h5>Jam Keluar</h5>
                                <h5>Jenis Motor</h5>
                                <h5>Total Harga</h5>
                                </div>
                                <div class="col-4 pl-5 ml-5 py-3">   
                                <h5>Vario</h5>
                                <h5>F4039NY</h5>
                                <h5>11.30</h5>
                                <h5>20.00</h5>
                                <h5>Motor Gede</h5>
                                <h5>Rp.7000</h5>
                                </div>
                            </div>
                            <div class="card-header py-3 text-center">
                                <h4 class="m-0 font-weight-bold text-primary">
                                    Terima Kasih
                                </h4>
                                <h5>Parkiran Cibinong</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
</body>
</html>