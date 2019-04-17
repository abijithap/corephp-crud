<?php
/**
 * Created by Abijith.
 * User: vinam
 * Date: 11/4/19
 * Time: 925 AM
 */
class Mysqldatabase{
    private $conn;
    private $debug;

    function __construct(){
    	$this->connection();
    }
    /**
    *@return void
    */
    private function connection(): void {
        $this->conn=new mysqli(
            "localhost",
            "test_usr",
            "root@V1nam",
            "student"
            
        );    
        if(!$this->conn)
            die($this->conn->connect_error);
	}
    /**
    * @param  $data
    * @return int
    */
    public function insert1($data) : int {                           
   	    $sql="insert into  ". get_called_class() ." SET ";  
        foreach ($data as $key => $value) {  
            if(array_key_exists($key,get_class_vars(get_called_class()))){
                $sql.= $key. " = '" . $value ."',";
            }
        } 
        $sql=rtrim($sql,",");
        if($this->debug==0){
            echo $sql;
        }
        return $this->conn->query($sql);
    }
    /**
    * @param $debug
    * @return int
    */
    public function setDebug($debug) : void {
        $this->debug=$debug;
    }
    /**
    *@param $Id
    *@param $limit
    *@return array
    */
    public function display($Id=0,$limit=5) : array {
       $classvariables=array_keys(get_class_vars(get_called_class()));
       $nonusablevariables=array(0=>"conn",1=>"debug");
       $usablevariables=array_diff($classvariables,$nonusablevariables);
       $tablefields=implode(",",$usablevariables);
       $sql="select ".$tablefields." from ".get_called_class();
       $sql = $Id > 0 ? $sql . " where id=" . $Id ." limit 1": $sql ." order by id desc limit $limit ";
       $sql.="";
       if($this->debug==1)
            echo "\n Query : ". $sql ."\n";
       $result = $this->conn->query($sql); 
       return $result->fetch_all(1); 
    }
    /**
    *@param $id 
    *@return int
    */
    public function delete($id) : int {
        $sql=" delete from ".get_called_class();
        $sql.=" where id = ".$id;
        if($this->debug==1)
            echo "\n Query : ". $sql ."\n";
        return $this->conn->query($sql);
    }
    /**
    *@param $data
    *@return int
    */
    public function update($data) : int {
    $sql="update ".get_called_class()." set ";
    foreach ($data as $key => $value){
        if(array_key_exists($key,get_class_vars(get_called_class()))){
            $sql.=$key."= '".$value."',";
        }
    }
    $sql=rtrim($sql,',');
    $sql.=" where id=".$data['id'];
    if($this->debug==1)
            echo "\n Query : ". $sql ."\n";
    return $this->conn->query($sql);
    }

}