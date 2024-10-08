<?php

namespace App;

enum ProjectStatus: string
{
    case Open = 'OPEN';
    case Closed = 'CLOSED';

    public function label(): string
    {
        return match ($this) {
            self::Open => 'Aceitando propostas',
            self::Closed => 'Encerrado'
        };
    }
}
