<!DOCTYPE html>
<html>
<head>
	<title>Sekolah Koding</title>

    <meta charset="UTF-8">
    <meta name="author" content="David R">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style type="text/css">
		html, 
        body { 
            height: 100%; 
            background-color:hsl(200, 50%, 95%);
        }

		.mid-center { 
            top: 50%; 
            left: 50%; 
            transform: translateX(-50%) translateY(-50%); 
        }

        .success {
            color: green;
        }

        .failure {
            color: red;
        }
	</style>
</head>
<body>
	<div class="position-relative h-100">	
        <h2 class="mb-4 text-center">Pendaftaran Siswa Sekolah Koding</h2>

		<div class="position-absolute mid-center">
            <a class="btn btn-outline-primary btn-lg btn-block" href="form-daftar.php">Daftar Baru</a>
            <a class="btn btn-outline-primary btn-lg btn-block" href="list-siswa.php">List Pendaftar</a>

            <?php if(isset($_GET['status'])): ?>
               <p>
                <?php
                    if($_GET['status'] == 'sukses'){
                        echo "<p class='text-center success'>Pendaftaran berhasil!</p>";
                    } else {
                        echo "<p class='text-center light failure'>Pendaftaran gagal!</p>";
                    }
                ?>
                </p>
            <?php endif; ?>
        </div>	
	</div>
</body>
</html>