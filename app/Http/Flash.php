<?php

namespace App\Http;

class Flash
{
    /**
     * Default time in seconds for
     * flash message to stay on
     * screen
     *
     * @var integer
     */
    protected $defaultTimer = 1700;
    
    /**
     * Create a flash message.
     *
     * @param  string       $title
     * @param  string       $message
     * @param  string       $level
     * @param  string|null  $key
     * @return void
     */
    public function create($title, $message, $level, $timer, $key = 'flash_message')
    {
        session()->flash($key, [
            'title'   => $title,
            'message' => $message,
            'level'   => $level,
            'timer'   => $timer
        ]);
    }

    /**
     * Create an information flash message.
     *
     * @param  string $title
     * @param  string $message
     * @return void
     */
    public function info($title, $message)
    {
        if ($timer) {
            $timer = $timer;
        } else {
            $timer = $this->defaultTimer;
        }
        return $this->create($title, $message, 'info', $timer);
    }

    /**
     * Create a success flash message.
     *
     * @param  string $title
     * @param  string $message
     * @return void
     */
    public function success($title, $message, $timer = null)
    {
        if ($timer) {
            $timer = $timer;
        } else {
            $timer = $this->defaultTimer;
        }
        return $this->create($title, $message, 'success', $timer);
    }

    /**
     * Create an error flash message.
     *
     * @param  string $title
     * @param  string $message
     * @return void
     */
    public function error($title, $message, $timer = null)
    {
        if ($timer) {
            $timer = $timer;
        } else {
            $timer = $this->defaultTimer;
        }
        return $this->create($title, $message, 'error', $timer);
    }
    
    /**
     * Create an overlay message with confirm to close button.
     *
     * @param  string $title
     * @param  string $message
     * @param  string $level
     * @return void
     */
    public function overlay($title, $message, $level = 'success')
    {

        return $this->create($title, $message, $level, null, 'flash_message_overlay');
    }
}
