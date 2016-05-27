<?php


namespace LocalStorage;


use Exception;
use LocalStorage\FileSystemDrivers\DiskFileSystemDriver;

/**
 * Class LocalStorage
 * @package LocalStorage
 */
class LocalStorage
{

	/** @var  FileSystemInterface */
	protected static $driver;

	/** @var  LocalStorage */
	protected static $instance;

	/**
	 * LocalStorage constructor.
	 *
	 * @param FileSystemInterface $driver
	 *
	 * @throws Exception
	 */
	public function __construct($driver = null)
	{
		static::init($driver);
	}

	public static function init($driver = null)
	{
		if($driver == null)
		{
			static::$driver = new DiskFileSystemDriver();
		}
		elseif($driver instanceof FileSystemInterface)
		{
			static::$driver = $driver;
		}
		else
		{
			throw new Exception('driver must be instance of FileSystemInterface');
		}
	}

	/**
	 * Get value stored in local storage
	 *
	 * @param string $key
	 * @param null   $default Default value if key not found
	 *
	 * @return mixed
	 */
	public static function get($key, $default = null)
	{
		if(!(static::$driver instanceof FileSystemInterface))
		{
			static::init();
		}

		return (static::$driver->read($key) ? static::$driver->read($key) : $default);
	}

	/**
	 * Save data in local storage
	 *
	 * @param string                   $key
	 * @param string|int|boolean|array $value
	 */
	public static function set($key, $value)
	{
		if(!(static::$driver instanceof FileSystemInterface))
		{
			static::init();
		}
		static::$driver->write($key, $value);
	}

	/**
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get($key)
	{
		return static::get($key);
	}

	/**
	 * @param string                   $key
	 * @param string|int|boolean|array $value
	 */
	public function __set($key, $value)
	{
		static::set($key, $value);
	}

}