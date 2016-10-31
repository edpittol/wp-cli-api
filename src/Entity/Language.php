<?php
namespace WP_CLI\Api\Entity;

/**
 * http://wp-cli.org/commands/core/language/list/
 */
class Language
{

    /**
     *
     * @var string The language code.
     */
    private $language;

    /**
     *
     * @var string The name of the language in English.
     */
    private $englishName;

    /**
     *
     * @var string The name in your own language.
     */
    private $nativeName;

    /**
     *
     * @var string The language status in the installation (active, installed
     *  or uninstalled).
     */
    private $status;

    /**
     *
     * @var boolean If has available update.
     */
    private $update;

    /**
     *
     * @var \DateTime The date of last available update.
     */
    private $updated;

    /**
     * Get the language code.
     *
     * @return string The language code.
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set the language code.
     *
     * @param string $language Set the language code.
     * @return \WP_CLI\Api\Entity\Language The object itself.
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Get the name of the language in English.
     *
     * @return string The name of the language in English.
     */
    public function getEnglishName()
    {
        return $this->englishName;
    }

    /**
     * Set the name of the language in English.
     *
     * @param string $englishName The name of the language in English.
     * @return \WP_CLI\Api\Entity\Language The object itself.
     */
    public function setEnglishName($englishName)
    {
        $this->englishName = $englishName;
        return $this;
    }

    /**
     * Get the name in your own language.
     *
     * @return string The name in your own language.
     */
    public function getNativeName()
    {
        return $this->nativeName;
    }

    /**
     * Set the name in your own language.
     *
     * @param string $nativeName The name in your own language.
     * @return \WP_CLI\Api\Entity\Language The object itself.
     */
    public function setNativeName($nativeName)
    {
        $this->nativeName = $nativeName;
        return $this;
    }

    /**
     * Get the language status in the installation (active, installed or
     * uninstalled).
     *
     * @return string The language status.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the language status in the installation (active, installed or
     * uninstalled).
     *
     * @param string $nativeName The language status.
     * @return \WP_CLI\Api\Entity\Language The object itself.
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get if has available update.
     *
     * @return boolean Has available update.
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * Set if has available update.
     *
     * @param string $update The available of the update.
     * @return \WP_CLI\Api\Entity\Language The object itself.
     */
    public function setUpdate($update)
    {
        $this->update = $update;
        return $this;
    }

    /**
     * Get the date of last available update.
     *
     * @return string The date of last available update.
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the date of last available update.
     *
     * @param string $update The date of last available update.
     * @return \WP_CLI\Api\Entity\Language The object itself.
     */
    public function setUpdated(\DateTime $updated = null)
    {
        $this->updated = $updated;
        return $this;
    }
}
