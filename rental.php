<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>

</head>
<body>
        <form action="" method="post" align="center">
        <h1>RENTAL MOTOR</h1> 
            <label for="nama">Nama Pelanggan:</label>
            <input type="text" name="nama" id="nama">
            <br>
            <label for="durasi">Lama rental (per hari):</label>
            <input type="number" name="durasi" id="durasi">
            <br>    
            <label for="jenis">Jenis Motor:</label>
            <select name="jenis" id="jenis">
                <option value="Scooter">Scooter</option>
                <option value="Matic">Matic</option>
                <option value="Sport">Sport</option>
                <option value="Trail">Trail</option>
                </select>
                <br>
            <input type="submit" name="submit">
        </form>
        
        <?php
            class rental {
                protected $durasi, $ppn = 10000, $harga, $diskon = 0.5, $nama;
                protected $Scooter = 70000;
                protected $Matic = 60000;
                protected $Sport = 50000;
                protected $Trail = 40000;
                protected $namaMember = [  
                    "adi", "susi", "rudi"
                ];
                    
                public function setCetakMember($harga, $durasi, $diskon){
                    $total = $harga * $durasi + $this->ppn;
                    $totalDiskon = $total * $diskon;
                    $totalBayar = $total - $totalDiskon;
                    echo "Jenis motor yang dirental adalah " . "<b>" . $_POST['jenis'] . " </b>selama <b>" . $_POST['durasi'] . " hari. </b></p>";
                    echo "Harga rental per-harinya: <b> Rp. " . number_format($harga, 2, ',', '.') . "</b></p>";
                    echo "Diskon member:" . "<b> Rp. " . number_format($totalDiskon, 2, ',', '.') . "</b>" . "</p>";
                    echo "Total yang harus dibayar: " . "<b> Rp. " . number_format($totalBayar, 2, ',', '.') . "</b></p>";
                }   

                public function setCetak($harga, $durasi){
                    $total = $harga * $durasi + $this->ppn;
                    echo "Jenis motor yang dirental adalah " . "<b>" . $_POST['jenis'] . " </b>selama <b>" . $_POST['durasi'] . " hari. </b></p>";
                    echo "Harga rental per-harinya: <b> Rp. " . number_format($harga, 2, ',', '.') . "</b></p>";
                    echo "Total yang harus dibayar: " . "<b> Rp. " . number_format($total, 2, ',', '.') . "</b></p>";
                }   
                    
                    
                public function getCetak(){
                    if(isset($_POST['submit'])) {
                        $nama = $_POST['nama'];
                        $durasi = $_POST['durasi'];
                        $jenisMotor = $_POST['jenis'];
                            
                        if((empty($nama)) || (empty($durasi)) || (empty($jenisMotor))) {
                            echo "isi data dengan lengkap!";
                        } else {
                            $hasil = new rental();
                                
                            if($jenisMotor == 'Scooter'){
                                $harga = $hasil->Scooter;
                            } else if ($jenisMotor == 'Matic'){
                                $harga = $hasil->Matic;
                            } else if ($jenisMotor == 'Sport'){
                                $harga = $hasil->Sport;
                            } else if ($jenisMotor == 'Trail'){
                                $harga = $hasil->Trail;
                            } 
                                
                            if(in_array($nama, $hasil->namaMember)){
                                $diskon = 0.05;
                                echo "Anda mendapatkan diskon <b>Member sebesar 5%.</b></p>";
                                $hasil->setCetakMember($harga, $durasi, $diskon);
                            } else {
                                $hasil->setCetak($harga, $durasi);
                            }
                                
                        }     
                    }
                }
            }
                
                $hitung = new rental();
                $hitung->getCetak();
            ?>
</body>
</html>