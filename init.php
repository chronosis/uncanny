<?php
/**
 * Simple example of extending the SQLite3 class and changing the __construct
 * parameters, then using the open method to initialize the DB.
 */
class UncannyDB extends SQLite3
{
    function __construct()
    {
        $this->open('uncanny.db', SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
    }

    function initDatabase()
    {
      $this->exec("CREATE TABLE IF NOT EXISTS responses (label STRING, body TEXT)");
      $this->exec("CREATE TABLE IF NOT EXISTS annotations (response_id, label STRING, body TEXT)");
    }

    function addResponse($label, $body)
    {
      $escLabel = $this->escapeString($label);
      $escBody = $this->escapeString($body);
      $this->exec("INSERT INTO responses (label, body) VALUES ('{$escLabel}', '{$escBody}')");
    }

    function addAnnotation($response_id, $label, $body)
    {
      $escLabel = $this->escapeString($label);
      $escBody = $this->escapeString($body);
      $this->exec("INSERT INTO responses (response_id, label, body) VALUES ('{$response_id}, {$escLabel}', '{$escBody}')");
    }

    function deleteResponse()
    {

    }

    function deleteAnnotation()
    {

    }
}

$db = new UncannyDB();

$db->exec("CREATE TABLE foo (bar STRING)");
$db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");

$result = $db->query('SELECT bar FROM foo');
var_dump($result->fetchArray());
?>
