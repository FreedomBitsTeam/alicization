<?php
	
	function getServerLoad($windows = false) {
    $os=strtolower(PHP_OS);
    if(strpos($os, 'win') === false){
        if(file_exists('/proc/loadavg')){
            $load = file_get_contents('/proc/loadavg');
            $load = explode(' ', $load, 1);
            $load = $load[0];
        }elseif(function_exists('shell_exec')){
            $load = explode(' ', `uptime`);
            $load = $load[count($load)-1];
        }else{
            return false;
        }

        if(function_exists('shell_exec'))
            $cpu_count = shell_exec('cat /proc/cpuinfo | grep processor | wc -l');        

        return array('load'=>$load, 'procs'=>$cpu_count);
    }elseif($windows){
        if(class_exists('COM')){
            $wmi=new COM('WinMgmts:\\\\.');
            $cpus=$wmi->InstancesOf('Win32_Processor');
            $load=0;
            $cpu_count=0;
            if(version_compare('4.50.0', PHP_VERSION) == 1){
                while($cpu = $cpus->Next()){
                    $load += $cpu->LoadPercentage;
                    $cpu_count++;
                }
            }else{
                foreach($cpus as $cpu){
                    $load += $cpu->LoadPercentage;
                    $cpu_count++;
                }
            }
            return array('load'=>$load, 'procs'=>$cpu_count);
        }
        return false;
    }
    return false;
	}
	
	function Module($num, $cmd) {
		$a = getServerLoad(1);
		if ($a) {
			return "<br>".$a['load']." - ".$a['procs'];
		} else {
			return "<br>недоступно на этой системе";
		}
	}
	
?>