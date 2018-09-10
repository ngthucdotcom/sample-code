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
    echo $giatri_dau.' '.$baitoan.' '.$giatri_cuoi.' = ';
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
      echo '<input type="text" value="';
      if(isset($_POST['send'])) giai($_POST['A'],$_POST['send'],$_POST['B']);
      echo '" readonly><br />';
    ?>
    <input type="number" name="A" value="<?php if(isset($_POST['send'])) echo $_POST['A']; ?>" placeholder="Nhap gia tri A"><br />
    <input type="number" name="B" value="<?php if(isset($_POST['send'])) echo $_POST['B']; ?>" placeholder="Nhap gia tri B"><br />
    <input type="submit" name="send" value="+">
    <input type="submit" name="send" value="-">
    <input type="submit" name="send" value="*">
    <input type="submit" name="send" value="/">
    <input type="submit" name="send" value="^">
  </form>
</center>
