<?php
namespace StudioAtrium\Entity;

class User
{
    const TYPE_USER  = 'user';
    const TYPE_ADMIN = 'admin';

    const STATUS_ENABLED  = 'enabled';
    const STATUS_DISABLED = 'disabled';
    const STATUS_PENDING  = 'pending';

    private int     $id           = 0;
    private string  $email        = '';
    private string  $password     = '';
    private string  $name         = '';
    private string  $surname      = '';
    private string  $nick         = '';
    private string  $phone        = '';
    private string  $type         = self::TYPE_USER;
    private string  $status       = self::STATUS_ENABLED;
    private ?string $hash         = null;
    private bool    $impersonated = false;

    public function getId(): int               { return $this->id; }
    public function setId(int $v): void        { $this->id = $v; }

    public function getEmail(): string         { return $this->email; }
    public function setEmail(string $v): void  { $this->email = $v; }

    public function getPassword(): string         { return $this->password; }
    public function setPassword(string $v): void  { $this->password = $v; }

    public function getName(): string          { return $this->name; }
    public function setName(string $v): void   { $this->name = $v; }

    public function getSurname(): string           { return $this->surname; }
    public function setSurname(string $v): void    { $this->surname = $v; }

    public function getNick(): string          { return $this->nick; }
    public function setNick(string $v): void   { $this->nick = $v; }

    public function getPhone(): string         { return $this->phone; }
    public function setPhone(string $v): void  { $this->phone = $v; }

    public function getType(): string          { return $this->type; }
    public function setType(string $v): void   { $this->type = $v; }

    public function getStatus(): string            { return $this->status; }
    public function setStatus(string $v): void     { $this->status = $v; }

    public function getHash(): ?string         { return $this->hash; }
    public function setHash(?string $v): void  { $this->hash = $v; }

    public function isImpersonated(): bool     { return $this->impersonated; }

    public function impersonate(int $originalId): void
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
