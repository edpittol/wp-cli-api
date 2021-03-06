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
                'method' => 'deserializeJson',
            ),
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => CoreUpdate::class,
                'method' => 'deserializeJson',
            ),
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => Language::class,
                'method' => 'deserializeJson',
            ),
        );
    }

    /**
     * Deserialize JSON to an array of object.
     *
     * @param JsonDeserializationVisitor $visitor The deserialization class
     *  object.
     * @param string[string] $items The object or array of the type.
     * @param string[string] $type The items type info.
     *  [name] string The type class name.
     *  [parms] mixed[] The object params
     * @param Context $context The Serializer context.
     * @return StdClass[]|CoreUpdate[]|Language[] An array with returned data.
     */
    public function deserializeJson(JsonDeserializationVisitor $visitor, $items, $type, Context $context)
    {
        if (empty($items)) {
            return array();
        }

        switch ($type['name']) {
            case CoreUpdate::class:
                return $this->deserializeToCore($items);
            case Language::class:
                return $this->deserializeToLanguage($items);
        }

        return $this->deserializeToStdClass($items);
    }

    /**
     * Convert an associative array to stdClass objects array.
     *
     * @param array $items The items.
     * @return StdClass[] The array with the objects.
     */
    public function deserializeToStdClass($items)
    {
        $util = new ArrayUtil();
        if ($util->isAssociative($items)) {
            return array((object) $items);
        }
        
        $returnData = array();
        foreach ($items as $item) {
            $returnData[] = (object) $item;
        }
        
        return $returnData;
    }

    /**
     * Convert an associative array to CoreUpdate objects array.
     *
     * @param array $items The items.
     * @return CoreUpdate[] The array with the objects.
     */
    public function deserializeToCore($items)
    {
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
     * Convert an associative array to Language objects array.
     *
     * @param array $items The items.
     * @return Language[] The array with the objects.
     */
    public function deserializeToLanguage($items)
    {
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
