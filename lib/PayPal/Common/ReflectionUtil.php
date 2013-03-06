<?php
namespace PayPal\Common;

class ReflectionUtil {
	
	
	/**
	 * @var array|ReflectionMethod[]
	 */
	private static $propertiesRefl = array();
	
	/**
	 * @var array|string[]
	 */
	private static $propertiesType = array();
	
	
	/**
	 * 
	 * @param string $class
	 * @param string $propertyName
	 */
	public static function getPropertyClass($class, $propertyName) {
		
		if (($annotations = self::propertyAnnotations($class, $propertyName)) && isset($annotations['param'])) {		
// 			if (substr($annotations['param'], -2) === '[]') {
// 				$param = substr($annotations['param'], 0, -2);
// 			}
			$param = $annotations['param'];
		}

		if(isset($param)) {
			$anno = explode(' ', $param);
			return $anno[0];
		} else {
			return 'string';
		}
	}
	
	
	/**
	 * @param string $class
	 * @param string $propertyName
	 * @throws RuntimeException
	 * @return string
	 */
	public static function propertyAnnotations($class, $propertyName)
	{
		$class = is_object($class) ? get_class($class) : $class;
		if (!class_exists('ReflectionProperty')) {
			throw new RuntimeException("Property type of " . $class . "::{$propertyName} cannot be resolved");
		}
	
		if ($annotations =& self::$propertiesType[$class][$propertyName]) {
			return $annotations;
		}
	
		$setterFunc = "set" . ucfirst($propertyName);
		if (!($refl =& self::$propertiesRefl[$class][$propertyName])) {
			$refl = new \ReflectionMethod($class, $setterFunc);
		}
	
		// todo: smarter regexp
		if (!preg_match_all('~\@([^\s@\(]+)[\t ]*(?:\(?([^\n@]+)\)?)?~i', $refl->getDocComment(), $annots, PREG_PATTERN_ORDER)) {
			return NULL;
		}
		foreach ($annots[1] as $i => $annot) {
			$annotations[strtolower($annot)] = empty($annots[2][$i]) ? TRUE : rtrim($annots[2][$i], " \t\n\r)");
		}
	
		return $annotations;
	}
}