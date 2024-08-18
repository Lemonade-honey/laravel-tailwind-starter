<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('logError')) {
    /**
     * Logger Level `Error`
     * 
     * membuat log data dengan level Error, @required $massage
     */
    function logError(string $message, Throwable $th): void
    {
        logMessageWithThrowable('error', $message, $th);
    }
}

if (!function_exists('logWarning')) {
    /**
     * Logger Level `Warning`
     * 
     * membuat log data dengan level Warning, @required $massage
     */
    function logWarning(string $message, Throwable $th): void
    {
        logMessageWithThrowable('warning', $message, $th);
    }
}

if (!function_exists('logCritical')) {
    /**
     * Logger Level `Critical`
     * 
     * membuat log data dengan level critical, @required $massage
     */
    function logCritical(string $message, Throwable $th): void
    {
        logMessageWithThrowable('critical', $message, $th);
    }
}

if (!function_exists('logNotice')) {
    /**
     * Logger Level `Notice`
     * 
     * membuat log data dengan level Notice, @required $massage
     */
    function logNotice(string $message, array $context = []): void
    {
        logMessage('notice', $message, $context);
    }
}

if (!function_exists('logInfo')) {
    /**
     * Logger Level `Info`
     * 
     * membuat log data dengan level info, @required $massage
     */
    function logInfo(string $message, array $context = []): void
    {
        logMessage('info', $message, $context);
    }
}

if (!function_exists('logDebug')) {
    /**
     * Logger Level `Debug`
     * 
     * membuat log data dengan level debug, @required $massage
     */
    function logDebug(string $message, array $context = []): void
    {
        logMessage('debug', $message, $context);
    }
}

// log khusus throwable
if (!function_exists('logMessageWithThrowable')) {
    function logMessageWithThrowable(string $level, string $message, Throwable $th)
    {
        $callerInfo = getCallerInfo();
        Log::$level($message, array_merge($callerInfo, [
            'message' => $th->getMessage()
        ]));
    }
}

// log massage saja
if (!function_exists('logMessage')) {
    function logMessage(string $level, string $message, array $context = [])
    {
        $callerInfo = getCallerInfo();
        Log::$level($message, array_merge($callerInfo, $context));
    }
}

// mengambil data debug backtrace
if (!function_exists('getCallerInfo')) {
    function getCallerInfo(): array
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 4);

        // check debug call
        // Log::debug($backtrace);

        $callerIndex = count($backtrace) > 3 ? 3 : 2; // Adjust the caller index
        $class       = isset($backtrace[$callerIndex]['class']) ? $backtrace[$callerIndex]['class'] : null;
        $function    = isset($backtrace[$callerIndex]['function']) ? $backtrace[$callerIndex]['function'] : null;

        return [
            'class' => $class,
            'function' => $function,
        ];
    }
}