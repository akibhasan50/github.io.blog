<?php 

 class Database{
      private $dbname="mysql:host=localhost; dbname=db_blog;";
      private $dbuser="root";
      private $dbpass="";
      public $conn;

    public function __construct(){
        if(!isset($this->conn)){
            try {
                $this->conn= new PDO("$this->dbname,$this->dbuser,$this->dbpass");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                die("connection failed".$e->getMessage());
            }
        }
     }
     public function showAllpost(){
            $post =$this->conn->query($sql);
            $post->execute();
            $result=$post->fetchAll();
            return $result;
     }

}

?>
