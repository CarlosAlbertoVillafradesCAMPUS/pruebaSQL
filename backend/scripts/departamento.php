<?php
namespace App;
class departamento extends connect{
    use getInstance;
    private $message;
    private $queryPost = 'INSERT INTO departamento(nombreDep, idPais) VALUES(:name, :idPais)';
    private $queryGet = 'SELECT departamento.*, nombrePais FROM departamento INNER JOIN pais ON departamento.idPais = pais.idPais';
    private $queryGetId ='SELECT departamento.*, nombrePais FROM departamento INNER JOIN pais ON departamento.idPais = pais.idPais WHERE idDep = :id';
    private $queryPut = 'UPDATE departamento SET nombreDep = :newName, idPais = :idPais WHERE departamento.idDep = :id';
    private $queryDelete = 'DELETE FROM departamento WHERE departamento.idDep = :id';


    public function __construct(public $nombreDep=1, public $idPais =1){parent::__construct();}

    public function departamentoPost(){
            try {
                $res = $this->__get("conex")->prepare($this->queryPost);
                $res->bindValue("name", $this->nombreDep);
                $res->bindValue("idPais", $this->idPais);
                $res->execute();
                $this->message = ["STATUS"=>200,"MESSAGE"=>"Add Sucodeesfull"];
                
             } catch (\PDOException $e) {
                $this->message = $e->getMessage();
             } finally{
                print_r($this->message);
             }
        
    }

    public function departamentoGet(){
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

    public function departamentoGetId($code){
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

    public function departamentoPut($code){
        try {
            $res = $this->__get("conex")->prepare($this->queryPut);
            $res->bindValue("newName", $this->nombreDep);
            $res->bindValue("idPais", $this->idPais);
            $res->bindValue("id", $code);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>"Update Sucodeesfull"];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            print_r($this->message);
        }
    }

    public function departamentoDelete($code){
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