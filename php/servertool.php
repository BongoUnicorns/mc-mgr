<?php
session_start();

if(isset($_POST['server1'])){


  echo "command would run";
  $tokenname = 'potato';
  $input = "open ~/Library";
  shell_exec('sh ../Shell/screenInterface.sh X' . $tokenname . 'X ' . '"' . $input . '"');
  echo "<script>window.location.href = 'https://google.com';</script>";


}elseif($_SESSION['username']='admin' && $_SESSION['password']='mcserver'){
  echo 'hello';
  echo <<<EN1
    <form action='' method='post'>
      <input type='hidden' name='server1' id='server1' value='1'>
      <input type="submit">
    </form>
EN1;
}

else{
  echo <<<ENO
  <script>window.location.href = '/index.html';</script>

ENO;
}


?>
