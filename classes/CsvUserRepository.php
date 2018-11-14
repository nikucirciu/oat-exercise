<?php

class CsvUserRepository extends UserRepository
{
	/**
	 * @var string
	 */
	private $file;

	/**
	 * @param string $file
	 */
	public function __construct(string $file)
	{
		$this->file = $file;
	}

	/**
	 * @inheritdoc
	 */
	protected function read(): array
	{
		$users = [];
		$skip = true;

		$handle = fopen($this->file, 'r');
		if(!$handle)
		{
			return $users;
		}

		do
		{
			$line = fgetcsv($handle);
			if($line)
			{
				if($skip)
				{
					$skip = false;
					continue;
				}

				$id = isset($line[0]) ? $line[0] : '';
				$password = isset($line[1]) ? $line[1] : '';
				$title = isset($line[2]) ? $line[2] : '';
				$first_name = isset($line[3]) ? $line[3] : '';
				$last_name = isset($line[4]) ? $line[4] : '';
				$gender = isset($line[5]) ? $line[5] : '';
				$email_address = isset($line[6]) ? $line[6] : '';
				$picture_url = isset($line[7]) ? $line[7] : '';
				$address = isset($line[8]) ? $line[8] : '';

				if($id)
				{
					$user = new User($id);
					$user->setPassword($password);
					$user->setTitle($title);
					$user->setFirstName($first_name);
					$user->setLastName($last_name);
					$user->setGender($gender);
					$user->setEmailAddress($email_address);
					$user->setPictureUrl($picture_url);
					$user->setAddress($address);
					$users[$user->getId()] = $user;
				}
			}
		}
		while($line);

		fclose($handle);

		return $users;
	}
}
