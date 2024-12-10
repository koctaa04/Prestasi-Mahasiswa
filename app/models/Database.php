

<?php
class Database {
    private $serverName = "DESKTOP-TO6C2N9"; // Sesuaikan dengan konfigurasi SQL Server Anda

    private $connectionInfo = array(
        "Database" => "PrestasiMahasiswa",
        "CharacterSet" => "UTF-8"
    );

    public $conn;

    // Fungsi untuk mendapatkan koneksi ke database
    public function getConnection() {
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionInfo);
        if ($this->conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        return $this->conn;
    }
    
}
?>
