<?php


namespace MordiSacks\LocalStorage;

/**
 * Interface FileSystemInterface
 * @package LocalStorage
 */
interface LocalStorageDriverInterface
{
	/**
	 * @param string $key
	 * @param        $value
	 *
	 * @return mixed
	 */
	public function write($key, $value);

	/**
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function read($key);
}