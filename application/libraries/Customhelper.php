<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Customhelper
 * 
 * @package   
 * @author Olanipekun Olufemi 
 * @copyright Olanipekun Olufemi 
 * @version 2013
 * @access public
 */
class Customhelper{
    
/**
 * Customhelper::notification()
 * 
 * @param mixed $message
 * @param string $type
 * @return
 */
function notification($message, $type='info'){
    switch($type){
        case 'info':
        $header = "Information";
        $class = "info";
        break;
        
        case 'success':
        $header = "Success!";
        $class = "success";
        break;
        
        case 'warning':
        $header = "Warning!";
        $class = "warning";
        break;
        
        case 'error':
        $header = "Error!";
        $class = "error";
        break;
        
        default:
        $header = "Information";
        $class = "info";
        break;
        
    }
    
    echo('<div class="message '.$class.'">
                                <h5>'.$header.'</h5>
                                <p>
                                    '.$message.'
                                </p>
                            </div>');
                            return TRUE;
}


/**
 * Customhelper::warning()
 * 
 * @param mixed $message
 * @return
 */
function warning($message){
    $this->notification($message,"warning");
    return TRUE;
}


/**
 * Customhelper::info()
 * 
 * @param mixed $message
 * @return
 */
function info($message){
    $this->notification($message,"info");
    return TRUE;
}


/**
 * Customhelper::success()
 * 
 * @param mixed $message
 * @return
 */
function success($message){
    $this->notification($message,"success");
    return TRUE;
}


/**
 * Customhelper::error()
 * 
 * @param mixed $message
 * @return
 */
function error($message){
    $this->notification($message,"error");
    return TRUE;
}


}

 ?>