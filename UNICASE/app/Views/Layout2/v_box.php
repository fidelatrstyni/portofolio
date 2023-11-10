<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Produk Box</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row p-3">
                        <div class="col-md-12">

                            <div class="mb-3">
                                <input type="search" id="searchBox" class="form-control" placeholder="Cari produk...">
                            </div>
                            <div class="mb-3">
                                <label for="productsPerPage">Tampilkan per Halaman:</label>
                                <select id="productsPerPage" class="form-select">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" id="sortHighestStock">Stok Terbanyak</button>
                                <button class="btn btn-primary" id="sortLowestStock">Stok Tersedikit</button>
                            </div>

                            <div class="row" id="productsContainer">
                                <!-- Data produk akan ditampilkan di sini -->
                            </div>

                            <div class="center-pagination">
                                <ul class="pagination" id="pagination"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    