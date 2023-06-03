<!DOCTYPE html>
<html lang="en">

<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <title>Keamanan Data</title>
</head>

<style>
    textarea {
        resize: none;
    }
</style>

<?php
$cek = 0;
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    $_SESSION["id"] = $_POST["id"];
    $_SESSION["key"] = $_POST["key"];
    $_SESSION["ivkey"] = $_POST["ivkey"];
}

if (isset($_POST['clear'])) {
    $_SESSION["id"] = '';
    $_SESSION["key"] = '';
    $_SESSION["ivkey"] = '';
}

if (isset($_POST['submit2'])) {
    $_SESSION["id2"] = $_POST["id2"];
    $_SESSION["key2"] = $_POST["key2"];
    $_SESSION["ivkey2"] = $_POST["ivkey2"];
}

if (isset($_POST['clear2'])) {
    $_SESSION["id2"] = '';
    $_SESSION["key2"] = '';
    $_SESSION["ivkey2"] = '';
}
?>

<body>
    <div class="container" style="font-family:cambria;">
        <br>
        <div class="card bg-primary text-white">
            <center>
                <h1>---===AES 256 bit===---</h1>
            </center>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <center>
                                <h2>---===ENKRIPSI===---</h2>
                            </center>
                            Text Plaintext
                            <textarea class="form-control" name="id" rows="5" placeholder="Masukan Plaintext" required><?php echo $_SESSION["id"]; ?></textarea>
                            Key :
                            <textarea class="form-control" name="key" rows="1" placeholder="Masukan 32 Karakter" maxlength="32" required><?php echo $_SESSION["key"]; ?></textarea>
                            IV Key :
                            <textarea class="form-control" name="ivkey" rows="1" placeholder="Masukan 16 Karakter (Opsional)" maxlength="16"><?php echo $_SESSION["ivkey"]; ?></textarea><br>
                            <center>
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                <input type="submit" name="clear" value="Clear" class="btn btn-secondary">
                            </center>
                        </form>

                        <?php
                        //Define cipher 
                        $cipher = "aes-256-cbc";

                        //Data to encrypt 
                        if (isset($_POST['submit'])) {
                            $id = $_POST['id'];
                            //Generate a 256-bit encryption key 
                            $encryption_key = $_POST['key'];
                            // Generate an initialization vector 
                            $iv = $_POST['ivkey'];
                            $encrypted_data = openssl_encrypt($id, $cipher, $encryption_key, 0, $iv);
                            $judul = "ENKRIPSI";
                            $hasil = $encrypted_data;
                            $cek = 1;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <center>
                                <h2>---===DESKRIPSI===---</h2>
                            </center>
                            Text Ciphertext
                            <textarea class="form-control" name="id2" rows="5" placeholder="Masukan Ciphertext" required><?php echo $_SESSION["id2"]; ?></textarea>
                            Key :
                            <textarea class="form-control" name="key2" rows="1" placeholder="Masukan 32 Karakter" maxlength="32" required><?php echo $_SESSION["key2"]; ?></textarea>
                            IV Key :
                            <textarea class="form-control" name="ivkey2" rows="1" placeholder="Masukan 16 Karakter (Opsional)" maxlength="16"><?php echo $_SESSION["ivkey2"]; ?></textarea><br>
                            <center>
                                <input type="submit" name="submit2" value="Submit" class="btn btn-primary">
                                <input type="submit" name="clear2" value="Clear" class="btn btn-secondary">
                            </center>
                        </form>

                        <?php
                        //Define cipher 
                        $cipher = "aes-256-cbc";

                        //Data to encrypt 
                        if (isset($_POST['submit2'])) {
                            $id2 = $_POST['id2'];
                            //Generate a 256-bit encryption key 
                            $encryption_key2 = $_POST['key2'];
                            // Generate an initialization vector 
                            $iv2 = $_POST['ivkey2'];
                            $decrypted_data = openssl_decrypt($id2, $cipher, $encryption_key2, 0, $iv2);
                            $judul = "DESKRIPSI";
                            $hasil = $decrypted_data;
                            $cek = 1;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php
        if ($cek == 1) {
            echo "<center><h2>---===HASIL " . $judul . "===---</h2></center>";
        ?>

            <div class="card">
                <textarea class="form-control" name="hasil" rows="5"><?php echo $hasil;
                                                                    } ?></textarea>
            </div>
    </div>
    <div class="card-footer text-muted">
        <center>
            Netiva Hidayah (672020060) | David Aji Saputra (672020157) | Dita Ayu Ramadiyanti (672020177) | Krisna Adi Saputra (672020178)
        </center>
    </div>

</body>

</html>