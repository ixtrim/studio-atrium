<?php
namespace StudioAtrium\Entity;

class User
{
    const TYPE_USER  = 'user';
    const TYPE_ADMIN = 'admin';

    const STATUS_ENABLED  = 'enabled';
    const STATUS_DISABLED = 'disabled';
    const STATUS_PENDING  = 'pending';

    private $id           = 0;
    private $email        = '';
    private $password     = '';
    private $name         = '';
    private $surname      = '';
    private $nick         = '';
    private $phone        = '';
    private $type         = self::TYPE_USER;
    private $status       = self::STATUS_ENABLED;
    private $hash         = null;
    private $impersonated = false;
    public function getId(): int               { return $this->id; }
    public function setId(int $v)        { $this->id = $v; }

    public function getEmail(): string         { return $this->email; }
    public function setEmail(string $v)  { $this->email = $v; }

    public function getPassword(): string         { return $this->password; }
    public function setPassword(string $v)  { $this->password = $v; }

    public function getName(): string          { return $this->name; }
    public function setName(string $v)   { $this->name = $v; }

    public function getSurname(): string           { return $this->surname; }
    public function setSurname(string $v)    { $this->surname = $v; }

    public function getNick(): string          { return $this->nick; }
    public function setNick(string $v)   { $this->nick = $v; }

    public function getPhone(): string         { return $this->phone; }
    public function setPhone(string $v)  { $this->phone = $v; }

    public function getType(): string          { return $this->type; }
    public function setType(string $v)   { $this->type = $v; }

    public function getStatus(): string            { return $this->status; }
    public function setStatus(string $v)     { $this->status = $v; }

    public function getHash()         { return $this->hash; }
    public function setHash($v)  { $this->hash = $v; }

    public function isImpersonated(): bool     { return $this->impersonated; }

    public function impersonate(int $originalId)
    {
        $this->impersonated = true;
    }

    public function toArray(): array
    {
        return [
            'id'      => $this->id,
            'email'   => $this->email,
            'name'    => $this->name,
            'surname' => $this->surname,
            'nick'    => $this->nick,
            'phone'   => $this->phone,
            'type'    => $this->type,
            'status'  => $this->status,
        ];
    }
}
