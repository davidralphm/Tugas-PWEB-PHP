<?php

include("config.php");

// Jika query string tidak ada ID
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

// Ambil ID yang ada di query string
$id = $_GET['id'];

// Membuat query untuk mengambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// Jika data yang diedit tidak ada di database
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Siswa Sekolah Koding</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<<body>
    <div class="container row justify-content-center m-auto">
        <div class="col-sm">
            <header>
                <h3 class="text-center mt-3">Formulir Edit Data Siswa</h3>
            </header>
     
            <form action="proses-edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
     
                <div class="form-group">
                    <label for="nama">Nama Lengkap: </label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama lengkap..." value="<?php echo $siswa['nama'] ?>" />
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat: </label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat tempat tinggal..."><?php echo $siswa['alamat'] ?></textarea>
                </div>

                <fieldset class="form-group">
                    <legend class="col-form-label">Jenis Kelamin</legend>
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="laki" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>>
                        <label class="form-check-label" for="laki">
                            Laki laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> 
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="agama">Agama: </label>
                    <?php $agama = $siswa['agama']; ?>
                    <select class="form-control" name="agama">
                        <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                        <option <?php echo ($agama == 'Kristen Protestan') ? "selected": "" ?>>Kristen Protestan</option>
                        <option <?php echo ($agama == 'Katolik') ? "selected": "" ?>>Katolik</option>
                        <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                        <option <?php echo ($agama == 'Buddha') ? "selected": "" ?>>Buddha</option>
                        <option <?php echo ($agama == 'Khonghucu') ? "selected": "" ?>>Khonghucu</option>
                        <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sekolah_asal">Nama Sekolah Asal: </label>
                    <input type="text" class="form-control" name="sekolah_asal" placeholder="Nama sekolah asal..." value="<?php echo $siswa['sekolah_asal'] ?>" />
                </div>
                <div class="form-group">
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Perbarui Data" name="simpan" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
 