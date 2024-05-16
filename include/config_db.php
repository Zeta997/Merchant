
<?php
require("../vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->safeLoad();


class BBDD{
    public $db_parametrer;
    private $host;
    private $db_name;
    private $user;
    private $pass;
    
    function __construct(){
        $this->host= $_SERVER["DB_HOST"];
        $this->db_name= $_SERVER["DB_DATABASE_NAME"];
        $this->user= $_SERVER["DB_USER"];
        $this->pass= $_SERVER["DB_PASS"];
        $this->run_dataBase();
    }

    function run_dataBase(){
        try{
            $this->db_parametrer = new PDO("mysql:host=$this->host; dbname=$this->db_name","$this->user","$this->pass");
            $this->db_parametrer->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db_parametrer->exec("SET CHARACTER SET utf8");
            
            return $this->db_parametrer;
        }catch(Exception $e){
            echo "Error: ". $e->getMessage();

        }
    }
    
}
$a= new BBDD();
?>