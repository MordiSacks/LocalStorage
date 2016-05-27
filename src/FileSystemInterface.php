<?php


namespace LocalStorage;

/**
 * Interface FileSystemInterface
 * @package LocalStorage
 */
interface FileSystemInterface
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