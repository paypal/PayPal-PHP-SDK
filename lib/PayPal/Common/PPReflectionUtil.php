<?php

namespace PayPal\Common;

/**
 * Class PPReflectionUtil
 *
 * @package PayPal\Common
 */
class PPReflectionUtil
{

    /**
     * Reflection Methods
     *
     * @var \ReflectionMethod[]
     */
    private static $propertiesRefl = array();

    /**
     * Properties Type
     *
     * @var string[]
     */
    private static $propertiesType = array();


    /**
     * Gets Property Class
     *
     * @param $class
     * @param $propertyName
     * @return string
     */
    public static function getPropertyClass($class, $propertyName)
    {

        if (($annotations = self::propertyAnnotations($class, $propertyName)) && isset($annotations['return'])) {
            $param = $annotations['return'];
        }

        if (isset($param)) {
            $anno = preg_split("/[\s\[\]]+/", $param);
            return $anno[0];
        } else {
            return 'string';
        }
    }

    /**
     * Retrieves Annotations of each property
     *
     * @param $class
     * @param $propertyName
     * @throws \RuntimeException
     * @return mixed
     */
    public static function propertyAnnotations($class, $propertyName)
    {
        $class = is_object($class) ? get_class($class) : $class;
        if (!class_exists('ReflectionProperty')) {
            throw new \RuntimeException("Property type of " . $class . "::{$propertyName} cannot be resolved");
        }

        if ($annotations =& self::$propertiesType[$class][$propertyName]) {
            return $annotations;
        }

        if (!($refl =& self::$propertiesRefl[$class][$propertyName])) {
            $getter = method_exists($class, "get" . ucfirst($propertyName)) ?
                "get" . ucfirst($propertyName) :
                "get" . preg_replace_callback("/([_\-\s]?([a-z0-9]+))/", "self::replace_callback", $propertyName);
            $refl = new \ReflectionMethod($class, $getter);
            self::$propertiesRefl[$class][$propertyName] = $refl;
        }

        // todo: smarter regexp
        if ( !preg_match_all(
            '~\@([^\s@\(]+)[\t ]*(?:\(?([^\n@]+)\)?)?~i',
            $refl->getDocComment(),
            $annots,
            PREG_PATTERN_ORDER)) {
            return null;
        }
        foreach ($annots[1] as $i => $annot) {
            $annotations[strtolower($annot)] = empty($annots[2][$i]) ? TRUE : rtrim($annots[2][$i], " \t\n\r)");
        }

        return $annotations;
    }

    /**
     * preg_replace_callback callback function
     *
     * @param $match
     * @return string
     */
    private static function replace_callback($match)
    {
        return ucwords($match[2]);
    }
}
