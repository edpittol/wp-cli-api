<?php
namespace WP_CLI\Api\Serializer;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Context;
use JMS\Serializer\JsonDeserializationVisitor;
use WP_CLI\Api\Entity\CoreUpdate;
use WP_CLI\Api\Util\ArrayUtil;
use WP_CLI\Api\Entity\Language;

/**
 * The serializer handle to manipulate the deserialization of command return
 * data.
 */
class Handler implements SubscribingHandlerInterface
{
    /**
     * Subscribe the deserialization methods.
     *
     * http://jmsyst.com/libs/serializer/master/handlers#subscribing-handlers
     *
     * @return string[][] The deserialization methods.
     */
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => \stdClass::class,
                'method' => 'deserializeJsonToStdClass',
            ),
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => CoreUpdate::class,
                'method' => 'deserializeJsonToCore',
            ),
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => Language::class,
                'method' => 'deserializeJsonToLanguage',
            ),
        );
    }

    /**
     * Deserialize JSON to stdClass.
     *
     * @param JsonDeserializationVisitor $visitor The deserialization class
     *  object.
     * @param string[string] $items The object or array of the type.
     * @param string[string] $type The items type info.
     *  [name] string The type class name.
     *  [parms] mixed[] The object params
     * @param Context $context The Serializer context.
     * @return StdClass[] An array with returned data.
     */
    public function deserializeJsonToStdClass(JsonDeserializationVisitor $visitor, $items, $type, Context $context)
    {
        $util = new ArrayUtil();
        
        if (empty($items)) {
            return array();
        }

        if ($util->isAssociative($items)) {
            return (object) $items;
        }
        
        $returnData = array();
        foreach ($items as $item) {
            $returnData[] = (object) $item;
        }
        
        return $returnData;
    }

    /**
     * Deserialize JSON to stdClass.
     *
     * @param JsonDeserializationVisitor $visitor The deserialization class
     *  object.
     * @param string[string] $type The items type info.
     * @param string|array[string] $type The items type info.
     *  [name] string The type class name.
     *  [parms] mixed[] The object params
     * @param Context $context The Serializer context
     * @return CoreUpdate[] An array with returned data.
     */
    public function deserializeJsonToCore(JsonDeserializationVisitor $visitor, $items, array $type, Context $context)
    {
        if (is_null($items)) {
            return array();
        }
        
        $returnData = array();
        foreach ($items as $item) {
            $coreUpdate = new CoreUpdate();
            $coreUpdate
                ->setVersion($item['version'])
                ->setUpdateType($item['update_type'])
                ->setPackageUrl($item['package_url']);
            $returnData[] = $coreUpdate;
        }
        
        return $returnData;
    }

    /**
     * Deserialize JSON to language object.
     *
     * @param JsonDeserializationVisitor $visitor The deserialization class
     *  object.
     * @param string[string] $type The items type info.
     * @param string|array[string] $type The items type info.
     *  [name] string The type class name.
     *  [parms] mixed[] The object params
     * @param Context $context The Serializer context
     * @return Language[] An array with returned data.
     */
    public function deserializeJsonToLanguage(JsonDeserializationVisitor $visitor, $items, array $type, Context $context)
    {
        if (is_null($items)) {
            return array();
        }
        
        $returnData = array();
        foreach ($items as $item) {
            $language = new Language();
            
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $item['updated']);
            if (! $date) {
                $date = null;
            }
            
            $language
                ->setLanguage($item['language'])
                ->setEnglishName($item['english_name'])
                ->setNativeName($item['native_name'])
                ->setStatus($item['status'])
                ->setUpdate($item['update'])
                ->setUpdated($date);
            $returnData[] = $language;
        }
        
        return $returnData;
    }
}
