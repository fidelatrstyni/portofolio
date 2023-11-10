<!DOCTYPE html>
<html>

<head>
    <title>Data Tables Example</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

<body>
    <table id="productTable" class="display">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Review Count</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: '<?=base_url()?>/Data Produk.json', // Ganti 'nama_file.json' dengan nama file JSON Anda
            dataType: 'json',
            success: function(response) {
                var data = response.data; // Assuming your data is within an object property 'data'
                if (Array.isArray(data)) {
                    data.forEach(function(item) {
                        var newRow = $("<tr>");
                        newRow.append("<td><img src='" + item.primary_image.thumbnail +
                            "' alt='Product Image' width='100'></td>");
                        newRow.append("<td><a href='" + item.product_url +
                            "' target='_blank'>" + item.name + "</a></td>");
                        newRow.append("<td>" + item.price.text_idr + "</td>");
                        newRow.append("<td>" + item.stock + "</td>");
                        newRow.append("<td>" + item.stats.reviewCount + "</td>");
                        newRow.append("<td>" + item.stats.averageRating + "</td>");
                        $('#productTable').append(newRow);
                    });
                } else {
                    console.error("Data is not in the expected format.");
                }

                $('#productTable').DataTable();
            },
            error: function() {
                console.error("Failed to fetch data.");
            }
        });
    });
    </script>
</body>

</html>