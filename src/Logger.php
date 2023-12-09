<?php

namespace Samuelirwin\Logger;

use Illuminate\Support\Facades\Log;
use ReflectionException;
use ReflectionMethod;

class Logger
{
    public function record(object $class, string $method, string $logType, string $summary, array $details = [])
    {
        try {
            $reflection = new ReflectionMethod($class, $method);
            $fileLocation = $reflection->getFileName();
        } catch (ReflectionException $e) {
            throw new \ErrorException('Invalid method: ' . $e->getMessage());
        }

        $className = class_basename($class);

        $allowedLogTypes = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];

        if (!in_array($logType, $allowedLogTypes, true)) {
            throw new \ErrorException('Invalid log type');
        }

        Log::{$logType}($summary, [
            'context' => $className . '::' . $method,
            'location' => $fileLocation,
            'details' => $details,
        ]);
    }
}
