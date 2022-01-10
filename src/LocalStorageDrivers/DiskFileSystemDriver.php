<?php

namespace MordiSacks\LocalStorage\LocalStorageDrivers;

use Exception;
use MordiSacks\LocalStorage\LocalStorageDriverInterface;

/**
 * Class DiskFileSystemDriver
 * Requires writing permissions
 *
 * @package LocalStorage\FileSystemDrivers
 */
class DiskFileSystemDriver implements LocalStorageDriverInterface
{
    /**
     * DiskFileSystemDriver constructor.
     *
     * @param string $file file to store data in
     */
    /** @var  string */
    private $file;
    
    /** @var  array */
    private $storage;
    
    public function __construct($file = '')
    {
        /**
         * Set file in use
         */
        $this->file = ($file == '' ? getcwd() . DIRECTORY_SEPARATOR . 'localStorage.db' : $file);
        
        /**
         * Load the file
         * If file doesn't exists, init array
         */
        if (!file_exists($this->file)) {
            $this->storage = [];
            return;
        }
        
        
        /**
         * Check if file is empty
         * If file is empty, init array
         */
        if (empty(file_get_contents($this->file))) {
            $this->storage = [];
            return;
        }
        
        /**
         * Check if file contains array
         * If so, load it
         * If not, throw exception, Good day!
         */
        /** @noinspection PhpIncludeInspection */
        $storage = require_once($this->file);
        if (is_array($storage)) {
            $this->storage = $storage;
            return;
        } else {
            throw new Exception('File "' . $this->file . '" is in wrong format');
        }
    }
    
    /**
     * @param string $key
     * @param        $value
     *
     * @return mixed
     */
    public function write($key, $value)
    {
        $this->storage[$key] = $value;
    }
    
    /**
     * @param string $key
     *
     * @return mixed
     */
    public function read($key)
    {
        return isset($this->storage[$key]) ? $this->storage[$key] : false;
    }
    
    /**
     * When we are done, we need to save the array to the file.
     */
    public function __destruct()
    {
        file_put_contents($this->file, '<?php' . PHP_EOL . 'return ' . var_export($this->storage, true) . ';');
    }
}