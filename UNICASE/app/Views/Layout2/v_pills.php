<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Top 10 Produk dengan Jumlah Stok Terbanyak</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <button class="btn btn-primary" id="toggleChartTop">Tampilkan Grafik</button>
                        <table id="topStockProducts" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Review Count</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data akan ditampilkan di sini -->
                            </tbody>
                        </table>
                        <canvas id="topChart" style="display: none;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Top 10 Produk dengan Jumlah Stok Tersedikit</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <button class="btn btn-primary" id="toggleChartBottom">Tampilkan Grafik</button>
                        <table id="bottomStockProducts" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Review Count</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data akan ditampilkan di sini -->
                            </tbody>
                        </table>
                        <canvas id="bottomChart" style="display: none;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>