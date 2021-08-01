<?php 
include "koneksi.php";
if (isset($_POST['kokab'])) {
    $kokab = $_POST['kokab'];

        $dataKokab = mysqli_query($con,"SELECT * FROM kecamatan_diskrit WHERE id_kokab=$kokab");
        ?>
        <option value="">-Pilih-</option>
        <?php 
        while ($data = mysqli_fetch_assoc($dataKokab)) { ?>
           <option value="<?=$data['id_kedis']; ?>"><?=$data['nama_kedis']; ?></option>
     <?php }
}else if(isset($_POST['kedis'])){
    $kedis = $_POST['kedis'];

        $dataKodis = mysqli_query($con,"SELECT * FROM kelurahan_desa WHERE id_kedis=$kedis");
        ?>
           <option value="">-Pilih-</option>
         <?php 
        while ($data = mysqli_fetch_assoc($dataKodis)) { ?>
           <option value="<?=$data['id_kedes']; ?>"><?=$data['nama_kedes']; ?></option>
     <?php }
}else if(isset($_POST['kedes'])){
    $kedes = $_POST['kedes'];
        $dataKodes = mysqli_query($con,"SELECT * FROM kelurahan_desa WHERE id_kedes=$kedes"); 
        $data      = mysqli_fetch_assoc($dataKodes);
        ?>
    <input type="text" name="kodepos" value="<?=$data['kode_pos'];?>" class="form-control">
<?php
}
?>