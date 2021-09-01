<?php


class DBController
{
    // Propriétés privés de connexion à la base de données
    protected $host = '127.0.0.1';
    protected $user = 'root';
    protected $password = '123456';
    protected $database = "shopee";

    //propriété de connexion
    public $con = null;

    // constructeur
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        }
    }
    //deconstructeur 
    public function __destruct()
    {
        $this->closeConnection();
    }

    // pour fermeture de connexion mysqli
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}