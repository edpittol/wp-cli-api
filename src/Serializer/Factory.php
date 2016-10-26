<?php
namespace WP_CLI\Api\Serializer;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Handler\HandlerRegistry;

/**
 * Factory class to create the project data serializer.
 */
class Factory
{

    /**
     * Create a data serializer adding the project data handler to manipulate
     * the data before serialize.
     *
     * @return \JMS\Serializer\Serializer The data serializer.
     */
    public static function create()
    {
        $builder = SerializerBuilder::create();
        $builder->configureHandlers(function (HandlerRegistry $registry) {
            $registry->registerSubscribingHandler(new Handler());
        });
        
        return $builder->build();
    }
}
