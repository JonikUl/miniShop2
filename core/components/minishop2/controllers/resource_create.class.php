<?php

class msResourceCreateController extends ResourceCreateManagerController
{
    /** @var miniShop2 $minishop2 */
    public $miniShop2;


    /**
     *
     */
    public function initialize()
    {
        $this->miniShop2 = $this->modx->getService('miniShop2');
        $this->setContext();
        $this->modx->getUser($this->ctx, true);

        parent::initialize();
    }


    /**
     * @param string $script
     */
    public function addCss($script)
    {
        $script = $script . '?v=' . $this->miniShop2->version;
        parent::addCss($script);
    }


    /**
     * @param string $script
     */
    public function addJavascript($script)
    {
        $script = $script . '?v=' . $this->miniShop2->version;
        parent::addJavascript($script);
    }


    /**
     * @param string $script
     */
    public function addLastJavascript($script)
    {
        $script = $script . '?v=' . $this->miniShop2->version;
        parent::addLastJavascript($script);
    }


    /**
     * @param string $key
     * @param array $options
     * @param mixed $default
     * @return mixed
     */
    public function getOption($key, $options = null, $default = null, $skipEmpty = false)
    {
        $option = $default;
        if (!empty($key) AND is_string($key)) {
            if (is_array($options) && array_key_exists($key, $options)) {
                $option = $options[$key];
            }
            elseif ($options = $this->modx->_userConfig AND array_key_exists($key, $options)) {
                $option = $options[$key];
            }
            elseif ($options = $this->context->config AND array_key_exists($key, $options)) {
                $option = $options[$key];
            }
            else {
                $option = $this->modx->getOption($key);
            }
        }
        if ($skipEmpty AND empty($option)) {
            $option = $default;
        }

        return $option;
    }

}