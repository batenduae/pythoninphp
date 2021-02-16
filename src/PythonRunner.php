<?php

namespace batenduae\Pythoninphp;

class PythonRunner
{
    public $file_path = '';

    public $out_put = '';

    public function pythonGrabber($pythonFilePathLaravelFormat)
    {
        $this->file_path = base_path() . DIRECTORY_SEPARATOR . $pythonFilePathLaravelFormat;
    }

    public function run()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $pythonPath = exec("where python");
        } else {
            $pythonPath = exec("which python");
        }
        $command = $pythonPath . " " . $this->file_path . " 2>&1";
        $pid = popen($command, "r");
        while (!feof($pid)) {
            $this->out_put .= fread($pid, 256);
            flush();
            ob_flush();
            usleep(100000);
        }
        pclose($pid);
        return $this->out_put;
    }
}
