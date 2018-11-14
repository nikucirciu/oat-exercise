<?php

class UserRepositoryFactory
{
	/**
	 * @var array
	 */
	private $data_files;

	/**
	 * @param array $data_files
	 */
	public function __construct(array $data_files)
	{
		$this->data_files = $data_files;
	}

	/**
	 * @param string $type
	 * @return UserRepository
	 * @throws InvalidArgumentException
	 */
	public function make(string $type): UserRepository
	{
		switch($type)
		{
			case 'json':
				return new JsonUserRepository($this->data_files[$type]);

			case 'csv':
				return new CsvUserRepository($this->data_files[$type]);

			default:
				throw new InvalidArgumentException('Invalid type');
				break;
		}
	}
}
