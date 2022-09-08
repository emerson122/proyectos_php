<?php
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function _construct()
    {
        // servidor
        $this->host         = 'localhost';
        $this->db           = 'seguridad';
        $this->user         = 'root';
        $this->password     = '';
        $this->charset      = 'utf8mb4';

    }

     function connect()
    {
       try {
        // $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
        // // $conexion = mysqli_connect($this->host,$this->user,$this->password,$this->db);
        // $options = [
        //     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        //     PDO::ATTR_EMULATE_PREPARES   => false,
        // ];
        // $pdo = new PDO($connection, $this->user, $this->password, $options);
        // $pdo = new mysqli($this->host, $this->user , $this->password ,$this->db );
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->password);
        return $pdo;

    }catch(PDOException $e){
        print_r('Error connection: ' . $e->getMessage());
    }   
}
}


?>