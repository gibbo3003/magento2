<?php
/**
 * Application request
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\App;

interface RequestInterface
{
    /**
     * Retrieve module name
     *
     * @return string
     */
    public function getModuleName();

    /**
     * Set Module name
     *
     * @param string $name
     * @return $this
     */
    public function setModuleName($name);

    /**
     * Retrieve action name
     *
     * @return string
     */
    public function getActionName();

    /**
     * Set action name
     *
     * @param string $name
     * @return $this
     */
    public function setActionName($name);

    /**
     * Retrieve param by key
     *
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed
     */
    public function getParam($key, $defaultValue = null);

    /**
     * Retrieve cookie value
     *
     * @param string|null $name
     * @param string|null $default
     * @return string|null
     */
    public function getCookie($name, $default);
}
