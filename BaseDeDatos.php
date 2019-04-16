<?php

class BaseDeDatos
{
    private $db = array();   

    public function insert($id, $value)
    {
        if (!isset($this->db[$id])) {
            $this->db[$id] = $value;
        }
    }
    
    public function get($id)
    {
        
        return $this->db [$id];
    }

    public function update($id,$value)
    {
        if (isset($this->db[$id])) {
            $this->db[$id] = $value;
        }
    }
    public function delete($id)
    {
        if (isset($this->db[$id])) {
            unset($this->db[$id]);
        }

    }
}
fclose($fp);

$datos1 = new BaseDeDatos;
$datos1->insert('a',2);
$datos1->insert('b',4);
$datos1->get('a');
$datos1->update('b',5);
$datos1->delete('a');

print_r($datos1);