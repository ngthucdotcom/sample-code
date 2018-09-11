<?php
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

  function giai($giatri_dau,$baitoan='+', $giatri_cuoi) {
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
    } else {
      echo tinhtong($giatri_dau,$giatri_cuoi);
    }
  }
?>

<!-- Nhap lieu tu ban phim -->
<center>
  <form method="post">
    <?php
      if(isset($_POST['send']) && ($_POST['send']=='AC')) session_destroy();
      if(count($_SESSION['calculator']) < 3) {
        $_SESSION['calculator'][]
      }
      echo '<input type="text" value="';
      if(isset($_POST['send'])) echo $_POST['A'].' '.$_POST['send'].' '.$_POST['B'];
      echo '" readonly style="border-bottom: 0; width: 190px"><br />';
      echo '<input type="text" value="';
      if(isset($_POST['send'])) giai($_POST['A'],$_POST['send'],$_POST['B']);
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
    <input type="submit" name="send" value="000" style="width: 35px">
    <input type="submit" name="send" value="%" style="width: 35px">
    <input type="submit" name="send" value="=" style="width: 35px"><br>
  </form>
</center>
