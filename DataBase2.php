<?php

class DataBase
{
    private $db;

    public function __construct()
    {
        $this->db = 'db.txt';
    }
    public function get($id)
    {
        $file = $this->readFromDb();
        return $file[$id];
    }
    public function insert($id,$value)
    {
        $file = $this->readFromDb();
        if (!isset($file[$id])) {
            $file[$id] = $value;
            $this->writeOnDb();
        }

    }
    public function update($id,$value)
    {
        $file = $this->readFromDb();
        if (isset($file[$id])) {
            $file[$id] = $value;
            $this->writeOnDb();
        }
    }
    public function delete($id)
    {   
        $file = $this->readFromDb();
        if(isset($file[$id])){
            unset($file[$id]);
            $this->writeOnDb();
        }
    }
    public function readFromDb()
    {
        return json_decode(file_get_contents($this->db),true);
    }
    public function writeOnDb()
    {
        return file_put_contents($this->db, json_enconde($this->readFromDb()));
    }
}
