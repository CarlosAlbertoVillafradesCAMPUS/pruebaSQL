<?php
namespace App;
class region extends connect{
    use getInstance;
    private $message;
    private $queryPost = 'INSERT INTO region(nombreReg, idDep) VALUES(:name, :idDep)';
    private $queryGet = 'SELECT region.*, nombreDep FROM region INNER JOIN departamento ON region.idDep = departamento.idDep';
    private $queryGetId ='SELECT region.*, nombreDep FROM region INNER JOIN departamento ON region.idDep = departamento.idDep WHERE idReg = :id';
    private $queryPut = 'UPDATE region SET nombreReg = :newName, idReg = :idReg WHERE region.idReg = :id';
    private $queryDelete = 'DELETE FROM region WHERE region.idReg = :id';


    public function __construct(public $nombreReg=1, public $idDep =1){parent::__construct();}

    public function regionPost(){
            try {
                $res = $this->__get("conex")->prepare($this->queryPost);
                $res->bindValue("name", $this->nombreReg);
                $res->bindValue("idDep", $this->idDep);
                $res->execute();
                $this->message = ["STATUS"=>200,"MESSAGE"=>"Add Sucodeesfull"];
                
             } catch (\PDOException $e) {
                $this->message = $e->getMessage();
             } finally{
                print_r($this->message);
             }
        
    }

    public function regionGet(){
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

    public function regionGetId($code){
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

    public function regionPut($code){
        try {
            $res = $this->__get("conex")->prepare($this->queryPut);
            $res->bindValue("newName", $this->nombreReg);
            $res->bindValue("idDep", $this->idDep);
            $res->bindValue("id", $code);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>"Update Sucodeesfull"];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            print_r($this->message);
        }
    }

    public function regionDelete($code){
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