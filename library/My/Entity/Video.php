<?php

namespace My\Entity;

/**
 * @Entity
 */
class Video extends Archivo
{
    
    public function __get($name){
        return $this->$name;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
}

