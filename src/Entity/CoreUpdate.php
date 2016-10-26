<?php
namespace WP_CLI\Api\Entity;

/**
 * http://wp-cli.org/commands/core/
 */
class CoreUpdate
{

    /**
     *
     * @var string The version to be updated.
     */
    private $version;

    /**
     *
     * @var string The update type, minor or major.
     */
    private $updateType;

    /**
     *
     * @var string The zip package URL to download.
     */
    private $packageUrl;

    /**
     * Get the version to be updated.
     *
     * @return string The version.
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the version to be updated.
     *
     * @param $version The version.
     * @return CoreUpdate The object itself.
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Get the update type.
     *
     * @return string The update type.
     */
    public function getUpdateType()
    {
        return $this->updateType;
    }

    /**
     * Set the update type. The type can be minor or major.
     *
     * @param $updateType The update type.
     * @return CoreUpdate The object itself.
     */
    public function setUpdateType($updateType)
    {
        $this->updateType = $updateType;
        return $this;
    }

    /**
     * Get the zip package URL to download.
     *
     * @return string The zip package URL.
     */
    public function getPackageUrl()
    {
        return $this->packageUrl;
    }

    /**
     * Set the zip package URL to download.
     *
     * @param $packageUrl The zip package URL.
     * @return CoreUpdate The object itself.
     */
    public function setPackageUrl($packageUrl)
    {
        $this->packageUrl = $packageUrl;
        return $this;
    }
}
