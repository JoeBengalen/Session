<?php

namespace JoeBengalen\Session;

use JoeBengalen\Config\AbstractConfig;

/**
 * Session object.
 * 
 * The session object makes use of a namespace to not interfere 
 * with other code using the $_SESSION global.
 */
class Session extends AbstractConfig implements SessionInterface
{
    /**
     * @var string Unique session namespace. 
     */
    protected $namespace = 'joebengalen.session';
    
    /**
     * @var array Reference to the $_SESSION data within the namespace. 
     */
    protected $data;
    
    /**
     * Create a new session namespace.
     * 
     * @param string $namespace Session namespace.
     * @param bool $initialize Whether to start a PHP session, register and reference the namespace in the constructor.
     */
    public function __construct($namespace = null, $initialize = true)
    {
        if (!is_null($namespace)) {
            $this->setNamespace($namespace);
        }
        
        if ($initialize) {
            $this->start();
            $this->registerNamespace();
            $this->referenceNamespace();
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function start()
    {
        if (!$this->isActive()) {
            session_start();
        }
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function destroy()
    {
        if ($this->isActive()) {
            $this->clear();
            session_destroy();
        }
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function isActive()
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }
    
    /**
     * {@inheritdoc}
     */
    public function registerNamespace()
    {
        if (!isset($_SESSION[$this->namespace]) || !is_array($_SESSION[$this->namespace])) {
            $_SESSION[$this->namespace] = [];
        }
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function referenceNamespace()
    {
        $this->data = &$_SESSION[$this->namespace];
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return $this->namespace;
    }
}
