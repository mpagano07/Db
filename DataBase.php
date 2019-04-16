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
        $file = $this-> readFromDb();
        return $file[$id];       
    }
    public function insert($id, $value)
    {
        $file = $this->readFromDb();
        if(!isset($file[$id])){
            $file[$id] = $value;
            $this->writeOnDb();
        }
 
    }
    public function update($id, $value)
    {
        $file = $this->readFromDb();
        if(isset($file[$id])){
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
    private function readFromDb()
    {
        return json_decode(file_get_contents($this->db), true);
    }
    private function writeOnDb()
    {
        return file_put_contents($this->db, json_encode($this->readFromDb()));
    }
}
 
$db = new DataBase();
$db->insert(1,'chachara');
$db->insert(2, 'hola');
$db->insert(3,'blabla');
$db->insert(4, 4);
$db->insert(5, array(1, 2, 3));
$db->insert(6, [array(1, 2, 3), array(3, 4, 5)]);
$db->update(2, 'chau');
$db->delete(1);
echo $db->get(2);