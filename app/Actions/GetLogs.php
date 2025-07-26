<?php

namespace App\Actions;

class GetLogs
{
    public function __invoke(string $level): string
    {
        $logs = <<<'LOGS'
            ERROR:   Filament v5 not found.
            WARNING: Do not spend too much time on examples.
            LOGS;

        if ($level === 'debug') {
            return <<<LOG
                DEBUG:   Hello Laravel Switzerland Meetup.
                $logs
                DEBUG:   Imagine more messages here.
                LOG;
        }

        return $logs;
    }
}
