<?php
class database {
    private $sql, $db, $sth;

    function database(){
        $this->db = new PDO('mysql:host=localhost;dbname=bt1_database', 'root', '');
        $this->db->query("set names utf8");
    }

    function setSQL($sql_string){
        $this->sql = $sql_string;
    }

    function execute(){
        $this->sth = $this->db->prepare($this->sql);
        $this->sth->execute();
        return $this->sth->rowCount();
    }

    function loadAllRow(){
        return $this->sth->fetchAll(PDO::FETCH_OBJ);
    }

    function loadRow(){
        return $this->sth->fetch(PDO::FETCH_OBJ);
    }

    function lasInsertId(){
        return $this->db->lastInsertId();
    }

}
?>