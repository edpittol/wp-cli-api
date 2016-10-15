<?php
namespace WP_CLI\Api\Composer;

use Composer\IO\NullIO;
use Composer\Composer;
use Composer\Factory as BaseFactory;

/**
 * Extends the Composer Factory class to create alternative of Composer
 * instance.
 */
class Factory extends BaseFactory
{

    /**
     * Create a minimal Composer object, without load the full packages.
     *
     * @return Composer The binary path.
     */
    public static function createMinimal()
    {
        $factory = new static();
        
        return $factory->createComposer(new NullIO(), null, true, null, false);
    }
}
