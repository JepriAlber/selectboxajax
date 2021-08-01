<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Box Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h4>Membuat Combobox Bertingkat di PHP dengan AJAX</h4>
        <div class="form-group">
            <label for="kokab">Kota / Kabupaten</label>
            <select name="kokab" id="kokab" class="form-control">
                <option>-Pilih-</option>
                <?php 
                include "koneksi.php";
                    $dataKokab = mysqli_query($con,"SELECT * FROM kota_kabupaten");
                    while ($kokab = mysqli_fetch_assoc($dataKokab)) { ?>
                     <option value="<?=$kokab['id_kokab'];?>"><?=$kokab['nama_kokab'];?></option>
                <?php    }
                ?>
            </select>
        </div>
        <div class="form-group" id="form-kedis">
            <label for="kedis">Kecamatan / Diskrit</label>
            <select name="kedis" id="kedis" class="form-control">
            </select>
        </div>
        <div class="form-group" id="form-kedes">
            <label for="kedes">Kelurahan / Desa</label>
            <select name="kedes" id="kedes" class="form-control">
            </select>
        </div>
        <div class="form-group" id="form-kodepos">
            <label for="kodepos">Kode POS</label>
            <div id="kodepos" name=kodepos>

            </div>
        </div>
    </div>
    <script>
        $('#form-kedis').hide();
        $('#form-kedes').hide();
        $('#form-kodepos').hide();

        $('#kokab').change(function(){
            //variabel dari nilai combo box kota kabupaten
            var id_kokab = $('#kokab').val();
            // $('#field-asisten').hide();
            
            //menggunakan ajax untuk mengirim dan menerima data server
            $.ajax({
                type:"POST",
                dataType:"html",
                url:"data.php",
                data:"kokab="+id_kokab,
                success:function(data){
                    $('#form-kedis').show();
                    $('#kedis').html(data);
                }
            });
            
        });

        $('#kedis').change(function(){
            var id_kedis = $('#kedis').val();
            $.ajax({
                type:"POST",
                dataType:"html",
                url:"data.php",
                data:"kedis="+id_kedis,
                success:function(data){
                    $('#form-kedes').show();
                    $('#kedes').html(data);
                }
            });
        });

        $('#kedes').change(function(){
            var id_kedes = $('#kedes').val();
            $.ajax({
                type:"POST",
                dataType:"html",
                url:"data.php",
                data:"kedes="+id_kedes,
                success:function(data){
                    $('#form-kodepos').show();
                    $('#kodepos').html(data);
                }
            });
        });
    </script>
</body>
</html>