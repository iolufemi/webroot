?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Customhelper{
    
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
    
    echo('div class="message '.$class.'">
                                h5>'.$header.'/h5>
                                p>
                                    '.$message.'
                                /p>
                            /div>');
                            return TRUE;
}

/**
 * toLetLagos::warning()
 * 
 * Displays a warning
 * 
 * @param mixed $message
 * @return boolean
 */
function warning($message){
    $this->notification($message,"warning");
    return TRUE;
}

/**
 * toLetLagos::info()
 * 
 * Displays an information
 * 
 * @param mixed $message
 * @return boolean
 */
function info($message){
    $this->notification($message,"info");
    return TRUE;
}

/**
 * toLetLagos::success()
 * 
 * Displays a success message
 * 
 * @param mixed $message
 * @return boolean
 */
function success($message){
    $this->notification($message,"success");
    return TRUE;
}

/**
 * toLetLagos::error()
 * 
 * Displays an error
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