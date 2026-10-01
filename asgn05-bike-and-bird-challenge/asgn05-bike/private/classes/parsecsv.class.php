<?php

class ParseCSV {
  /*
   * The delimiter is static so that it can be accessed from any ParseCSV object.
   * It is not a constant because it needs to be able to change if a new CSV file is introduced with a different delimiter.
   */
  public static string $delimiter = ',';
  public string $filename;
  private array $header = [];
  private $data = [];
  private $rowCount = 0;

  public function __construct($filename='') {
    if($filename != '') {
      $this->file($filename);
    }
  }

  public function file(string $filename) {
    if(!file_exists($filename)) {
      echo "File does not exist.";
      return false;
    } elseif(!is_readable($filename)) {
      echo "File is not readable.";
      return false;
    }
    $this->filename = $filename;
    return true;
  }

  public function parse() {
    if(!isset($this->filename)) {
      echo "File not set.";
      return false;
    }
  
    $this->reset();

    $file = fopen($this->filename, 'r');
    while(!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if($row == [NULL] || $row === FALSE) { continue; }
      if(!$this->header) {
        $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->rowCount++;
      }
    }
    fclose($file);

    return $this->data;
  }

  /*
   * 
   */
  public function lastResults() {
    return $this->data;
  }

  public function rowCount() {
    return $this->rowCount;
  }

  private function reset() {
    $this->header = [];
    $this->data = [];
    $this->row_count = 0;
  }
}

?>
