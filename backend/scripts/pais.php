<?php
namespace App;
class pais extends connect{
    use getInstance;
    private $message;
    private $queryPost = 'INSERT INTO pais(nombrePais) VALUES(:name)';
    private $queryGet = 'SELECT * FROM pais';
    private $queryGetId ='SELECT * FROM pais WHERE pais.idPais = :id';
    private $queryPut = 'UPDATE pais SET nombrePais = :name WHERE idPais = :id';
    private $queryDelete = 'DELETE FROM pais WHERE idPais = :id';


    public function __construct(public $nombrePais=1){parent::__construct();}

    public function paisPost(){
            try {
                $res = $this->__get("conex")->prepare($this->queryPost);
                $res->bindValue("name", $this->nombrePais);
                $res->execute();
                $this->message = ["STATUS"=>200,"MESSAGE"=>"Add Sucodeesfull"];
                
             } catch (\PDOException $e) {
                $this->message = $e->getMessage();
             } finally{
                print_r($this->message);
             }
        
    }

    public function paisGet(){
        try {
            $res = $this->__get("conex")->prepare($this->queryGet);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>$res->fetchAll(\PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            return $this->message;
        }
    }

    public function paisGetId($code){
        try {
            $res = $this->__get("conex")->prepare($this->queryGetId);
            $res->bindValue("id", $code);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>$res->fetchAll(\PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            return $this->message;
        }
    }

    public function paisPut($code){
        try {
            $res = $this->__get("conex")->prepare($this->queryPut);
            $res->bindValue("name", $this->nombrePais);
            $res->bindValue("id", $code);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>"Update Sucodeesfull"];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            print_r($this->message);
        }
    }

    public function paisDelete($code){
        try {
            $res = $this->__get("conex")->prepare($this->queryDelete);
            $res->bindValue("id", $code);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>"Delete Sucodeesfull"];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            print_r($this->message);
        }
    }
}
?>