<?php

abstract class UserRepository
{
	/**
	 * @var User[]
	 */
	private $users;

	private function initialize(): void
	{
		if($this->users !== null)
		{
			return;
		}

		$this->users = $this->read();
	}

	/**
	 * @return User[]
	 */
	protected abstract function read(): array;

	/**
	 * @param string $id
	 * @return User|null
	 */
	public function findById(string $id): ?User
	{
		$this->initialize();
		return isset($this->users[$id]) ? $this->users[$id] : null;
	}

	/**
	 * @param string $name
	 * @param int $count
	 * @param int $offset
	 * @return User[]
	 */
	public function find(string $name = '', int $count = 0, int $offset = 0): array
	{
		$this->initialize();

		if($name === '')
		{
			$users = array_values($this->users);
		}
		else
		{
			$users = [];
			foreach($this->users as $user)
			{
				if(strcasecmp($name, $user->getFirstName()) === 0 && strcasecmp($name, $user->getLastName()) === 0)
				{
					$users[] = $user;
				}
			}
		}

		return $count === 0 ? $users : array_slice($users, $offset, $count);
	}
}
