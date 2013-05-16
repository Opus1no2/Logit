<?php
/**
 *
 * Simple logging class.
 * 
 * @author Travis Tillotson | tillotson.travis@gmail.com
 */
class Logit
{
  const INFO  = 0;
  const DEBUG = 1;
  const WARN  = 3;
  const ERROR = 4;
  const FATAL = 5;
  
  const DEFAULT_LOG = 'Loggit.log';
  
  /**
   * @var string $date
   */
  public static $format = 'Y-m-d H:i:s';
  /**
   * @var string $mod
   */
  public static $mode = 'a+';
  /**
   * @var string $file
   */
  public static $file = self::DEFAULT_LOG;
  
  /**
   *
   * Log information
   *
   * @param mixed $data
   * @param string $f
   * @param string $l
   *
   * @return void
   */
  public static function info($data, $f = null, $l = null)
  {
    self::_log(self::INFO, $data, $f, $l);
  }
  
  /**
   *
   * Log debug
   *
   * @param mixed $data
   * @param string $f
   * @param string $l
   *
   * @return void
   */
  public static function debug($data, $f = null, $l = null)
  {
    self::_log(self::DEBUG, $data, $f, $l);
  }
  
  /**
   *
   * Log warning
   *
   * @param mixed $data
   * @param string $f
   * @param string $l
   *
   * @return void
   */
  public static function warn($data, $f = null, $l = null)
  {
    self::_log(self::WARN, $data, $f, $l);
  }
  
  /**
   *
   * Log error
   *
   * @param mixed $data
   * @param string $f
   * @param string $l
   *
   * @return void
   */
  public static function error($data, $f = null, $l = null)
  {
    self::_log(self::ERROR, $data, $f, $l);
  }
  
  /**
   *
   * Log Fatal
   *
   * @param mixed $data
   * @param string $f
   * @param string $l
   *
   * @return void
   */
  public static function fatal($data, $f = null, $l = null)
  {
    self::_log(self::FATAL, $data, $f, $l);
  }
  
  /**
   *
   * Allow for custom logging status
   *
   * @param int $level
   * @param array $arg
   *
   * @return void
   */
  public static function __callStatic($level, $arg)
  {
    $d = !empty($arg[0]['data']) ? $arg[0]['data'] : 'null';
    $f = !empty($arg[0]['f'])    ? $arg[0]['f']    :  null;
    $l = !empty($arg[0]['l'])    ? $arg[0]['l']    :  null;
    
    self::_log($level, $d, $f, $l);
  }
  
  /**
   *
   * Set log file
   *
   * @param string $file
   *
   * @return void
   */
  public static function logFile($file)
  {
    if ($file) {
      self::$file = $file;
    }
  }
  
  /**
   *
   * Write level, data, file, and line to log
   *
   * @param int $level
   * @param mixed $data
   * @param string $f
   * @param string $l
   *
   * @return void
   *
   * @throws RunTimeException
   */
  protected static function _log($level, $data, $f = null, $l = null)
  {
    $h = @fopen(self::$file, self::$mode);
    @fwrite($h, self::_message($level, $data, basename($f), $l));
    @fclose($h);
  }
  
  /**
   *
   * Return formatted information to log
   *
   * @param mixed $data
   * @param string $f
   * @param string $l
   *
   * @return void
   *
   */
  protected static function _message($level, $data, $f = null, $l = null)
  { 
    $date = date(self::$format);
    $msg = "{$date} | file: {$f} line: {$l} | status({$level}) | {$data}" . PHP_EOL;
    return $msg;
  }
}