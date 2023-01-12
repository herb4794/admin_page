<?php
class Utility
{
  public function dataInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);

    return $data;
  }
  // Method for displaying Success And Error Message
  public function showMessage($type, $message)
  {
    return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
            <strong>' . $message . '</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';
  }
}

?>