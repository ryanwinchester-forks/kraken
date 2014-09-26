<?php namespace Kraken\Commands;

class CommandResponse {

    protected $status;
    
    protected $message;

    public function status()
    {
        return $this->status;
    }
    
    public function message()
    {
        return $this->message;
    }
    
    public function success($message)
    {
        $this->status = "success";
        $this->message = $message;
        
        return $this;
    }
    
    public function error($message)
    {
        $this->status = "danger";
        $this->message = $message;
        
        return $this;
    }
    
    public function warning($message)
    {
        $this->status = "warning";
        $this->message = $message;
        
        return $this;
    }
    
    public function info($message)
    {
        $this->status = "info";
        $this->message = $message;
        
        return $this;
    }

} 
