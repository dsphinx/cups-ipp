<?php

namespace Smalot\Cups\Connector;

/**
 * Trait CharsetAware
 *
 * @package Smalot\Cups\Connector
 */
trait CharsetAware
{

    /**
     * @var string
     */
    protected $charset;

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     *
     * @return CharsetAware
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;

        return $this;
    }

    /**
     * @return string
     */
    protected function buildCharset()
    {
        // Charset
        $charset = strtolower($this->getCharset());
        $metaCharset = chr(0x47) // charset type | value-tag
          .chr(0x00).chr(0x12) // name-length
          .'attributes-charset' // attributes-charset | name
          .$this->getStringLength($charset) // value-length
          .$charset; // value

        return $metaCharset;
    }
}
