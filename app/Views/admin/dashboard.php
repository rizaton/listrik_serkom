<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pelanggan</h5>
                        <p class="card-text">
                            <?php
                            $status = new \App\Models\Pelanggan();
                            $status = $status
                                ->db
                                ->table('pelanggan')
                                ->selectSum('id_pelanggan')
                                ->where('id_pelanggan != 0')
                                ->get()->getRow('id_pelanggan');
                            echo $status;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Tagihan Pelanggan</h5>
                        <p class="card-text">
                            <?php
                            $status = new \App\Models\Tagihan();
                            $status = $status
                                ->db
                                ->table('tagihan')
                                ->selectSum('id_tagihan')
                                ->where('id_pelanggan != 0')
                                ->get()->getRow('id_tagihan');
                            echo $status;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tagihan Belum Terproses</h5>
                        <p class="card-text">
                            <?php
                            $status = new \App\Models\Tagihan();
                            $status = $status
                                ->db
                                ->table('tagihan')
                                ->selectSum('status')
                                ->where('status = 2')
                                ->get()->getRow('status');
                            if (!$status) {
                                $status = 0;
                            }
                            echo $status;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tagihan Belum Terproses</h5>
                        <p class="card-text">
                            <?php
                            $status = new \App\Models\Tagihan();
                            $status = $status
                                ->db
                                ->table('tagihan')
                                ->selectSum('status')
                                ->where('status = 2')
                                ->get()->getRow('status');
                            if (!$status) {
                                $status = 0;
                            }
                            echo $status;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="table-wrapper">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-fixed">
                            <tr>
                                <th>id_tagihann</th>
                                <th>nama_pelanggan</th>
                                <th>status</th>
                                <th>bulan/tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Product 1</td>
                                <td>$10.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Product 2</td>
                                <td>$20.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Product 3</td>
                                <td>$30.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-wrapper">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-fixed">
                            <tr>
                                <th>id_tagihann</th>
                                <th>nama_pelanggan</th>
                                <th>status</th>
                                <th>bulan/tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>User 1</td>
                                <td>user1@example.com</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>User 2</td>
                                <td>user2@example.com</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>User 3</td>
                                <td>user3@example.com</td>
                            </tr>
                            <!-- add more table rows here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();  ?>