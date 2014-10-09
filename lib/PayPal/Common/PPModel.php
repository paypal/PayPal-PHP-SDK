<?php

namespace PayPal\Common;
use PayPal\Validation\ModelAccessorValidator;

/**
 * Generic Model class that all API domain classes extend
 * Stores all member data in a Hashmap that enables easy
 * JSON encoding/decoding
 */
class PPModel
{

    private $_propMap = array();

    /**
     * Default Constructor
     *
     * You can pass data as a json representation or array object. This argument eliminates the need
     * to do $obj->fromJson($data) later after creating the object.
     *
     * @param null $data
     * @throws \InvalidArgumentException
     */
    public function __construct($data = null)
    {
        switch (gettype($data)) {
            case "NULL":
                break;
            case "string":
                if (!$this->isJson($data)) {
                    throw new \InvalidArgumentException("data should be either json or array representation of object");
                }
                $this->fromJson($data);
                break;
            case "array":
                $this->fromArray($data);
                break;
            default:
        }
    }

    /**
     * Tests if the string provided is json representation or not.
     *
     * @param $string
     * @return bool
     */
    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Magic Get Method
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        if ($this->__isset($key)) {
            return $this->_propMap[$key];
        }
        return null;
    }

    /**
     * Magic Set Method
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        ModelAccessorValidator::validate($this, $this->convertToCamelCase($key));
        $this->_propMap[$key] = $value;
    }

    /**
     * Converts the input key into a valid Setter Method Name
     *
     * @param $key
     * @return mixed
     */
    private function convertToCamelCase($key)
    {
        return str_replace(' ', '', ucwords(str_replace(array('_', '-'), ' ', $key)));
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