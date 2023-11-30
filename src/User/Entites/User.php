<?php

namespace Etore\User\Entites;

class User
{
    private int $id;
    private string $email;
    private string $password;
    private string $nickname;
    private string $avatarurl;

    public function __construct(string $email, string $password, int $id = -1, string $nickname = 'New User', string $avatarUrl = 'https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png')
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->nickname = $nickname;
        $this->avatarurl = $avatarUrl;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarurl;
    }

    public function updateEmail($email)
    {
        $this->email = $email;
    }

    public function updatePassword($password)
    {
        $this->password = $password;
    }

    public function updateNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function updateAvatarUrl($avatarUrl)
    {
        $this->avatarurl = $avatarUrl;
    }

    public function generateToken(): string
    {
        $source = $this->email . $this->password . date('y-m-d h:i:s');
        return md5($source);
    }
}
