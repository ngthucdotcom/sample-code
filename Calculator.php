<?php
  session_start();

  function tinhtong($a,$b) {
      return $a+$b;
  }

  function tinhhieu($a,$b) {
      return $a-$b;
  }

  function tinhtich($a,$b) {
      return $a*$b;
  }

  function tinhthuong($a,$b) {
      return (($a == 0) || ($b == 0)) ? 'sai cu phap' : $a/$b;
  }

  function luythua($giatri,$so_mu = 1) {
      if($so_mu == 0) return 1;
      else if($so_mu == 1) return $giatri;
      else return $giatri*luythua($giatri,$so_mu-1);
  }

  function percent($giatri) {
      return $giatri/100;
  }

  function giai($giatri_dau,$baitoan='+', $giatri_cuoi=null) {
    //code
    // echo $giatri_dau.' '.$baitoan.' '.$giatri_cuoi.' = ';
    if($baitoan == '-') {
      echo tinhhieu($giatri_dau,$giatri_cuoi);
    } else if($baitoan == '*') {
      echo tinhtich($giatri_dau,$giatri_cuoi);
    } else if($baitoan == '/') {
      echo tinhthuong($giatri_dau,$giatri_cuoi);
    } else if($baitoan == '^') {
      echo luythua($giatri_dau,$giatri_cuoi);
    } else if($baitoan == '%') {
      echo percent($giatri_dau);
    } else {
      echo tinhtong($giatri_dau,$giatri_cuoi);
    }
  }
?>

<!-- Nhap lieu tu ban phim -->
<center>
  <form method="post">
    <?php
      if(isset($_POST['send']) && ($_POST['send']=='AC')) {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0">';
      }
      if(isset($_POST['send']) && ($_POST['send']!='AC')) {
        if($_POST['send'] == '+') $_SESSION['calculator']['cal'] = '+';
        else if($_POST['send'] == '-') $_SESSION['calculator']['cal'] = '-';
        else if($_POST['send'] == '*') $_SESSION['calculator']['cal'] = '*';
        else if($_POST['send'] == '/') $_SESSION['calculator']['cal'] = '/';
        else if($_POST['send'] == '^') $_SESSION['calculator']['cal'] = '^';
        else if($_POST['send'] == '%') $_SESSION['calculator']['cal'] = '%';
        else {
          if(!isset($_SESSION['calculator']['first'])) $_SESSION['calculator']['first'] = intval($_POST['send']);
          else if(!isset($_SESSION['calculator']['cal'])) {
            if($_POST['send'] == '00') $_SESSION['calculator']['first'] = intval($_SESSION['calculator']['first'])*100;
            else if($_POST['send'] == '.') $_SESSION['calculator']['dotfirst'] = true;
            else if(isset($_SESSION['calculator']['dotfirst'])) $_SESSION['calculator']['first'] = intval($_SESSION['calculator']['first']) + (intval($_POST['send'])/10);
            else $_SESSION['calculator']['first'] = intval($_SESSION['calculator']['first'])*10 + intval($_POST['send']);
          }
          else if(!isset($_SESSION['calculator']['second'])) $_SESSION['calculator']['second'] = intval($_POST['send']);
          else if((intval($_SESSION['calculator']['second'])) > 0) {
            if($_POST['send'] == '00') $_SESSION['calculator']['second'] = intval($_SESSION['calculator']['second'])*100;
            else if($_POST['send'] == '.') $_SESSION['calculator']['dotsecond'] = true;
            else if(isset($_SESSION['calculator']['dotsecond'])) $_SESSION['calculator']['second'] = intval($_SESSION['calculator']['second']) + (intval($_POST['send'])/10);
            else $_SESSION['calculator']['second'] = intval($_SESSION['calculator']['second'])*10 + intval($_POST['send']);
          }
        }
      }
      var_dump($_SESSION);
      if(isset($_SESSION['calculator']['result'])) {
        $first = intval($_SESSION['calculator']['result']);
        $cal = (isset($_SESSION['calculator']['cal'])) ? $_SESSION['calculator']['cal'] : null;
        $second = (isset($_SESSION['calculator']['second'])) ? $_SESSION['calculator']['second'] : null;
      } else {
        $first = (isset($_SESSION['calculator']['first'])) ? $_SESSION['calculator']['first'] : 0;
        $cal = (isset($_SESSION['calculator']['cal'])) ? $_SESSION['calculator']['cal'] : null;
        $second = (isset($_SESSION['calculator']['second'])) ? $_SESSION['calculator']['second'] : null;
      }

      echo '<input type="text" value="'.$first.' '.$cal.' '.$second.'" readonly style="border-bottom: 0; width: 190px"><br />';
      echo '<input type="text" value="';
      if($cal == '%') $_SESSION['calculator']['result'] = giai($first,$cal);
      if($second > 0) $_SESSION['calculator']['result'] = giai($first,$cal,$second);
      if(isset($_POST['send']) && ($_POST['send']=='=')) $_SESSION['calculator']['result'] = giai($first,$cal,$second);
      echo '" readonly style="border-top: 0; text-align: right; width: 190px"><br />';
    ?>
    <!-- <input type="number" name="A" value="<?php if(isset($_POST['send'])) echo $_POST['A']; ?>" placeholder="Nhap gia tri A" style="width: 190px"><br />
    <input type="number" name="B" value="<?php if(isset($_POST['send'])) echo $_POST['B']; ?>" placeholder="Nhap gia tri B" style="width: 190px"><br /> -->
    <input type="submit" name="send" value="7" style="width: 35px">
    <input type="submit" name="send" value="8" style="width: 35px">
    <input type="submit" name="send" value="9" style="width: 35px">
    <input type="submit" name="send" value="^" style="width: 35px">
    <input type="submit" name="send" value="AC" style="background-color: red; color: white; width: 35px"><br>
    <input type="submit" name="send" value="4" style="width: 35px">
    <input type="submit" name="send" value="5" style="width: 35px">
    <input type="submit" name="send" value="6" style="width: 35px">
    <input type="submit" name="send" value="*" style="width: 35px">
    <input type="submit" name="send" value="/" style="width: 35px"><br>
    <input type="submit" name="send" value="1" style="width: 35px">
    <input type="submit" name="send" value="2" style="width: 35px">
    <input type="submit" name="send" value="3" style="width: 35px">
    <input type="submit" name="send" value="+" style="width: 35px">
    <input type="submit" name="send" value="-" style="width: 35px"><br>
    <input type="submit" name="send" value="00" style="width: 35px">
    <input type="submit" name="send" value="0" style="width: 35px">
    <input type="submit" name="send" value="." style="width: 35px">
    <input type="submit" name="send" value="%" style="width: 35px">
    <input type="submit" name="send" value="=" style="width: 35px"><br>
  </form>
</center>
