<?php 

namespace App\Dtos;
class NotificationDtoResponse {
   public function __construct(
        public readonly ?string $title,
        public readonly ?string $message,
        public readonly ?int $userId,
        public readonly ?bool $read,
    ) {}

    public static function fromModel( $notification): self
    {
        return new self(
            $notification->titulo,
            $notification->mensaje,
            $notification->usuario_id,
            $notification->leido,
        );
    }

   
    public function toArray(): array
    {
        return array_filter([
            'titulo' => $this->title,
            'mensaje' => $this->message,
            'usuario_id' => $this->userId,
            'leido' => $this->read,
        ], fn ($value) => $value !== null);
    }

}