<?php

class JsonUserRepository extends UserRepository
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

		$json = file_get_contents($this->file);
		$items = $json ? json_decode($json, true) : false;
		if(!is_array($items))
		{
			return $users;
		}

		foreach($items as $item)
		{
			if(!is_array($item))
			{
				continue;
			}

			$id = isset($item['login']) ? $item['login'] : '';
			$password = isset($item['password']) ? $item['password'] : '';
			$title = isset($item['title']) ? $item['title'] : '';
			$first_name = isset($item['firstname']) ? $item['firstname'] : '';
			$last_name = isset($item['lastname']) ? $item['lastname'] : '';
			$gender = isset($item['gender']) ? $item['gender'] : '';
			$email_address = isset($item['email']) ? $item['email'] : '';
			$picture_url = isset($item['picture']) ? $item['picture'] : '';
			$address = isset($item['address']) ? $item['address'] : '';

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

		return $users;
	}
}
