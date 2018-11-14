<?php

class User
{
	/**
	 * @var string
	 */
	private $id;
	/**
	 * @var string
	 */
	private $password = '';
	/**
	 * @var string
	 */
	private $title = '';
	/**
	 * @var string
	 */
	private $first_name = '';
	/**
	 * @var string
	 */
	private $last_name = '';
	/**
	 * @var string
	 */
	private $gender = '';
	/**
	 * @var string
	 */
	private $email_address = '';
	/**
	 * @var string
	 */
	private $picture_url = '';
	/**
	 * @var string
	 */
	private $address = '';

	/**
	 * @param string $id
	 */
	public function __construct(string $id)
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword(string $password): void
	{
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getFirstName(): string
	{
		return $this->first_name;
	}

	/**
	 * @param string $first_name
	 */
	public function setFirstName(string $first_name): void
	{
		$this->first_name = $first_name;
	}

	/**
	 * @return string
	 */
	public function getLastName(): string
	{
		return $this->last_name;
	}

	/**
	 * @param string $last_name
	 */
	public function setLastName(string $last_name): void
	{
		$this->last_name = $last_name;
	}

	/**
	 * @return string
	 */
	public function getGender(): string
	{
		return $this->gender;
	}

	/**
	 * @param string $gender
	 */
	public function setGender(string $gender): void
	{
		$this->gender = $gender;
	}

	/**
	 * @return string
	 */
	public function getEmailAddress(): string
	{
		return $this->email_address;
	}

	/**
	 * @param string $email_address
	 */
	public function setEmailAddress(string $email_address): void
	{
		$this->email_address = $email_address;
	}

	/**
	 * @return string
	 */
	public function getPictureUrl(): string
	{
		return $this->picture_url;
	}

	/**
	 * @param string $picture_url
	 */
	public function setPictureUrl(string $picture_url): void
	{
		$this->picture_url = $picture_url;
	}

	/**
	 * @return string
	 */
	public function getAddress(): string
	{
		return $this->address;
	}

	/**
	 * @param string $address
	 */
	public function setAddress(string $address): void
	{
		$this->address = $address;
	}

	/**
	 * @param bool $full
	 * @return array
	 */
	public function toArray(bool $full = false): array
	{
		$result = [
			'id' => $this->id,
			'title' => $this->title,
			'firstName' => $this->first_name,
			'lastName' => $this->last_name,
			'pictureUrl' => $this->picture_url
		];

		if($full)
		{
			$result['gender'] = $this->gender;
			$result['emailAddress'] = $this->email_address;
			$result['address'] = $this->address;
		}

		return $result;
	}
}
