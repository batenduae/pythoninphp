<?php

namespace batenduae\Pythoninphp;

class RunRun
{
    public static function thisFile($pythonFilePathLaravelFormat)
    {
        $PythonRunner = new PythonRunner();
        $PythonRunner->pythonGrabber($pythonFilePathLaravelFormat);
        return $PythonRunner->run();
    }
}
