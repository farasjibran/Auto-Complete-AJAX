<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Complete Ajax</title>
    <!-- link boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container">
        <h1 align="center" style="margin-top: 40px">PHP AJAX SMK Taruna Bhakti</h1>
        <h2 align="center" class="mb-4 mt-4">Autocomplete Dengan Gambar dan Ajax</h2>
        <div align="center">
            <input type="text" placeholder="Cari Nama Siswa..." class="form-control" id="nama_siswa">
        </div>
        <ul class="list-group" id="resultlist"></ul>
    </div>
    <!-- script jquery -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                cache: false
            });
            $('#nama_siswa').keyup(function() {
                $('#resultlist').html('');
                $('#state').val('');
                let nama_siswa = $('#nama_siswa').val();

                $.ajax({
                    type: 'POST',
                    url: "get_data.php",
                    data: {
                        nama_siswa: nama_siswa
                    },
                    success: function(data) {
                        $.each(JSON.parse(data), function(key, value) {
                            $('#resultlist').append(`
                            <li class = "list-group-item link-class">
                                <img src = "avatar/` + value.avatar + `" height = "40" width = "40" class = "img-thumbnail"/>
                                <span class = "nama">` + value.nama_siswa + `</span>
                                <span class = "text-muted" style = "float: right;">` + value.alamat + `</span>
                            </li>`);
                        });
                    }
                });
            });

            $('#resultlist').on('click', 'li', function() {
                let nama_siswa = $(this).children('.nama').text();
                $('#nama_siswa').val(nama_siswa);
                $('#resultlist').html('');
            });
        });
    </script>
</body>

</html>