<?php
namespace App;
class campers extends connect{
    use getInstance;
    private $message;
    private $queryPost = 'INSERT INTO campers(idCamper,nombreCamper, apellidoCamper, fechaNac, idReg) VALUES(:cc, :name, :apellido, :fechaNac, :idReg)';
    private $queryGet = 'SELECT campers.*, region.nombreRegion, FROM campers INNER JOIN region ON campers.idReg = region.idReg';
    private $queryGetId ='SELECT campers.*, region.nombreRegion, FROM campers INNER JOIN region ON campers.idReg = region.idReg WHERE campers.idCamper = :id';
    private $queryPut = 'UPDATE campers SET nombreCamper = :name, apellidoCamper = :apellido, fechaNac = :fechaNac, idReg = :idReg   WHERE idCamper = :id';
    private $queryDelete = 'DELETE FROM campers WHERE idCamper = :id';


    public function __construct(public $idCamper=1, public $nombreCamper=1, public $apellidoCamper=1, public $fechaNac=1, public $idReg=1){parent::__construct();}

    public function campersPost(){
            try {
                $res = $this->__get("conex")->prepare($this->queryPost);
                $res->bindValue("cc", $this->idCamper);
                $res->bindValue("name", $this->nombreCamper);
                $res->bindValue("apellido", $this->apellidoCamper);
                $res->bindValue("fechaNac", $this->fechaNac);
                $res->bindValue("idReg", $this->idReg);
                $res->execute();
                $this->message = ["STATUS"=>200,"MESSAGE"=>"Add Succesfull"];
                
             } catch (\PDOException $e) {
                $this->message = $e->getMessage();
             } finally{
                print_r($this->message);
             }
        
    }

    public function campersGet(){
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

    public function campersGetId($code){
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

    public function campersPut($code){
        try {
            $res = $this->__get("conex")->prepare($this->queryPut);
            $res->bindValue("name", $this->nombreCamper);
            $res->bindValue("apellido", $this->apellidoCamper);
            $res->bindValue("fechaNac", $this->fechaNac);
            $res->bindValue("idReg", $this->idReg);
            $res->bindValue("id", $code);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>"Update Succesfull"];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            print_r($this->message);
        }
    }

    public function campersDelete($code){
        try {
            $res = $this->__get("conex")->prepare($this->queryDelete);
            $res->bindValue("id", $code);
            $res->execute();
            $this->message = ["STATUS"=>200,"MESSAGE"=>"Delete Succesfull"];
        } catch (\PDOException $e) {
            $this->message = $e->getMessage();
        } finally{
            print_r($this->message);
        }
    }
}
?>