<?php

namespace PayPal\Common;

/**
 * Generic Model class that all API domain classes extend
 * Stores all member data in a Hashmap that enables easy
 * JSON encoding/decoding
 */
class PPModel
{

    private $_propMap = array();

    /**
     * Magic Get Method
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->_propMap[$key];
    }

    /**
     * Magic Set Method
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->_propMap[$key] = $value;
    }

    /**
     * Magic isSet Method
     *
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->_propMap[$key]);
    }

    /**
     * Magic Unset Method
     *
     * @param $key
     */
    public function __unset($key)
    {
        unset($this->_propMap[$key]);
    }

    /**
     * Converts Params to Array
     *
     * @param $param
     * @return array
     */
    private function _convertToArray($param)
    {
        $ret = array();
        foreach ($param as $k => $v) {
            if ($v instanceof PPModel) {
                $ret[$k] = $v->toArray();
            } else if (is_array($v)) {
                $ret[$k] = $this->_convertToArray($v);
            } else {
                $ret[$k] = $v;
            }
        }
        return $ret;
    }

    /**
     * Fills object value from Array list
     *
     * @param $arr
     * @return $this
     */
    public function fromArray($arr)
    {

        foreach ($arr as $k => $v) {
            if (is_array($v)) {
                $clazz = PPReflectionUtil::getPropertyClass(get_class($this), $k);

                if (PPArrayUtil::isAssocArray($v)) {
                    /** @var self $o */
                    $o = new $clazz();
                    $o->fromArray($v);
                    $this->__set($k, $o);
                } else {
                    $arr = array();
                    foreach ($v as $nk => $nv) {
                        if (is_array($nv)) {
                            $o = new $clazz();
                            $o->fromArray($nv);
                            $arr[$nk] = $o;
                        } else {
                            $arr[$nk] = $nv;
                        }
                    }
                    $this->__set($k, $arr);
                }
            } else {
                $this->$k = $v;
            }
        }
        return $this;
    }

    /**
     * Fills object value from Json string
     *
     * @param $json
     * @return $this
     */
    public function fromJson($json)
    {
        return $this->fromArray(json_decode($json, true));
    }

    /**
     * Returns array representation of object
     *
     * @return array
     */
    public function toArray()
    {
        return $this->_convertToArray($this->_propMap);
    }

    /**
     * Returns object JSON representation
     *
     * @param int $options http://php.net/manual/en/json.constants.php
     * @return string
     */
    public function toJSON($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}