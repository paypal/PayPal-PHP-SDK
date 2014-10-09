<?php
namespace PayPal\Test\Common;

use PayPal\Common\PPModel;

class ArrayClass extends PPModel
{

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setTags($tags)
    {
        if (!is_array($tags)) {
            $tags = array($tags);
        }
        $this->tags = $tags;
    }

    public function getTags()
    {
        return $this->tags;
    }
}