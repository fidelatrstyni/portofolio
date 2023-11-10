<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made by
                <a href="#" class="font-weight-bold" target="_blank">Fidela Trisaktiyani</a>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </footer>
    </div>
</main>
  
  <!--   Core JS Files   -->
  <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: '<?=base_url()?>/Data Produk.json', // Ganti 'nama_file.json' dengan nama file JSON Anda
            dataType: 'json',
            success: function(response) {
                var data = response
                    .data; // Anda asumsikan data Anda berada dalam properti objek 'data'
                if (Array.isArray(data)) {
                    // Sortir berdasarkan jumlah stok
                    data.sort(function(a, b) {
                        return b.stock - a.stock;
                    });

                    // Ambil 10 produk pertama dengan stok terbanyak
                    var topStockProducts = data.slice(0, 10);

                    // Ambil 10 produk pertama dengan stok tersedikit
                    var bottomStockProducts = data.slice(-10).reverse();

                    displayProducts(topStockProducts, 'topStockProducts');
                    displayProducts(bottomStockProducts, 'bottomStockProducts');
                } else {
                    console.error("Data tidak dalam format yang diharapkan.");
                }
            },
            error: function() {
                console.error("Gagal mengambil data.");
            }
        });

        $('#toggleChartTop').on('click', function() {
            toggleView('top', $(this));
        });

        $('#toggleChartBottom').on('click', function() {
            toggleView('bottom', $(this));
        });

        function toggleView(chartType, button) {

            if (button.text() === 'Tampilkan Grafik') {
                button.text('Lihat Tabel');
            } else {
                button.text('Tampilkan Grafik');
            }

            if (chartType === 'top') {
                $('#topStockProducts').toggle();
                $('#topChart').toggle();

                if ($('#topChart').is(':visible')) {
                    showChart('topStockProducts', 'topChart');
                }
            } else if (chartType === 'bottom') {
                $('#bottomStockProducts').toggle();
                $('#bottomChart').toggle();

                if ($('#bottomChart').is(':visible')) {
                    showChart('bottomStockProducts', 'bottomChart');
                }
            }
        }

        function showChart(tableId, canvasId) {
            var table = $('#' + tableId).DataTable();
            var data = table.rows().data().toArray();

            var chartLabels = data.map(function(row) {
                return row[1]; // Kolom 2 (Nama Produk) sebagai label
            });

            var chartData = data.map(function(row) {
                return row[3]; // Kolom 4 (Jumlah Stok) sebagai data
            });

            var chartCanvas = document.getElementById(canvasId);
            var ctx = chartCanvas.getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Jumlah Stok',
                        data: chartData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            ticks: {
                                maxRotation: 90,
                                minRotation: 0,
                                autoSkip: false,
                                padding: 10
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

    });

    function displayProducts(products, tableId) {
        products.forEach(function(item) {
            var newRow = $("<tr>");
            newRow.append("<td><img src='" + item.primary_image.thumbnail +
                "' alt='Product Image' width='100'></td>");
            newRow.append("<td class='mb-0 text-sm'>" + item.name + "</td>");
            newRow.append("<td class='mb-0 text-sm'>" + item.price.text_idr + "</td>");
            newRow.append("<td class='mb-0 text-sm'>" + item.stock + "</td>");
            newRow.append("<td class='mb-0 text-sm'>" + item.stats.reviewCount + "</td>");
            newRow.append("<td class='mb-0 text-sm'>" + item.stats.averageRating + "</td>");
            $('#' + tableId + ' tbody').append(newRow);
        });

        $('#' + tableId).DataTable({
            "lengthMenu": [5, 10, 15, 20] // Pilihan jumlah entri yang tersedia
        });
    }
    </script>

<script>
    $(document).ready(function() {

        var productsPerPage = 10;
        var currentPage = 1;
        var productsData;

        $('#productsPerPage').on('change', function() {
            productsPerPage = parseInt($(this).val());
            currentPage = 1;
            displayProductsAsBoxes(productsData, currentPage);
            showPagination();
        });

        $.ajax({
            url: '<?=base_url()?>/Data produk.json', // Ganti dengan path file JSON Anda
            dataType: 'json',
            success: function(response) {
                productsData = response.data;
                displayProductsAsBoxes(productsData, currentPage);
                showPagination();
            },
            error: function() {
                console.error("Gagal mengambil data.");
            }
        });

        $('#sortHighestStock').on('click', function() {
            let sortedProducts = [...productsData];
            sortedProducts.sort((a, b) => b.stock - a.stock);
            displayProductsAsBoxes(sortedProducts, currentPage);
        });

        $('#sortLowestStock').on('click', function() {
            let sortedProducts = [...productsData];
            sortedProducts.sort((a, b) => a.stock - b.stock);
            displayProductsAsBoxes(sortedProducts, currentPage);
        });

        function displayProductsAsBoxes(products, page) {
            var container = $('#productsContainer');
            container.empty(); // Menghapus konten sebelum menambahkan produk

            var startIndex = (page - 1) * productsPerPage;
            var endIndex = startIndex + productsPerPage;
            var paginatedProducts = products.slice(startIndex, endIndex);

            paginatedProducts.forEach(function(item) {
                var productBox = $('<div class="col-md-4 mb-4"></div>'); // Menggunakan Bootstrap grid
                productBox.append('<div class="card">' +
                    '<img src="' + item.primary_image.thumbnail +
                    '" class="card-img-top" alt="Product Image">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">' + item.name + '</h5>' +
                    '<p class="card-text">Harga: ' + item.price.text_idr + '</p>' +
                    '<p class="card-text">Stok: ' + item.stock + '</p>' +
                    // Tambahkan informasi lainnya yang diperlukan dari data
                    '</div>' +
                    '</div>');

                container.append(productBox);
            });
        }

        function showPagination() {
            var totalProducts = productsData.length;
            var totalPages = Math.ceil(totalProducts / productsPerPage);
            var pagination = $('#pagination');
            pagination.empty();

            for (var i = 1; i <= totalPages; i++) {
                var listItem = $('<li class="page-item"><a class="page-link" href="#">' + i + '</a></li>');

                listItem.on('click', function(e) {
                    e.preventDefault();
                    var page = parseInt($(this).text());
                    currentPage = page;
                    displayProductsAsBoxes(productsData, currentPage);
                    highlightCurrentPage();
                });

                pagination.append(listItem);
            }

            highlightCurrentPage();
        }

        function highlightCurrentPage() {
            $('#pagination li').removeClass('active');
            $('#pagination li:nth-child(' + currentPage + ')').addClass('active');
        }

        $('#searchBox').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            var filteredProducts = productsData.filter(function(product) {
                return product.name.toLowerCase().includes(value);
            });

            currentPage = 1;
            displayProductsAsBoxes(filteredProducts, currentPage);
            showPagination();
        });
    });
    </script>

</body>

</html>
