      <form id="registration_form" onsubmit="register(); return false">
         <label for="nbareg_firstname">first name</label> <input type="text" name="nbareg_firstname" id="nbareg_firstname" value="<?php echo $_POST['nbareg_firstname']; ?>"><br>
         <label for="nbareg_lastname">last name</label> <input type="text" name="nbareg_lastname" id="nbareg_lastname" value="<?php echo $_POST['nbareg_lastname']; ?>"><br>
         birthday
         <select name="nbareg_month">
            <option value="01"<?php
            if ($_POST['nbareg_month'] == "01")
               echo ' selected="selected"';
            ?>>January</option>
            <option value="02"<?php
            if ($_POST['nbareg_month'] == "02")
               echo ' selected="selected"';
            ?>>February</option>
            <option value="03"<?php
            if ($_POST['nbareg_month'] == "03")
               echo ' selected="selected"';
            ?>>March</option>
            <option value="04"<?php
            if ($_POST['nbareg_month'] == "04")
               echo ' selected="selected"';
            ?>>April</option>
            <option value="05"<?php
            if ($_POST['nbareg_month'] == "05")
               echo ' selected="selected"';
            ?>>May</option>
            <option value="06"<?php
            if ($_POST['nbareg_month'] == "06")
               echo ' selected="selected"';
            ?>>June</option>
            <option value="07"<?php
            if ($_POST['nbareg_month'] == "07")
               echo ' selected="selected"';
            ?>>July</option>
            <option value="08"<?php
            if ($_POST['nbareg_month'] == "08")
               echo ' selected="selected"';
            ?>>August</option>
            <option value="09"<?php
            if ($_POST['nbareg_month'] == "09")
               echo ' selected="selected"';
            ?>>September</option>
            <option value="10"<?php
            if ($_POST['nbareg_month'] == "10")
               echo ' selected="selected"';
            ?>>October</option>
            <option value="11"<?php
            if ($_POST['nbareg_month'] == "11")
               echo ' selected="selected"';
            ?>>November</option>
            <option value="12"<?php
            if ($_POST['nbareg_month'] == "12")
               echo ' selected="selected"';
            ?>>December</option>
         </select>

         <select name="nbareg_date">
<?php
for ($i = 1; $i < 32; $i += 1) {
?>
            <option value="<?php
            if ($i < 10)
               echo "0";
            echo $i;
            ?>"<?php
            if ($_POST['nbareg_date'] == "0$i" || $_POST['nbareg_date'] == "$i")
               echo ' selected="selected"';
            ?>><?php echo $i; ?></option>
<?php
}
?>
         </select>

         <select name="nbareg_year">
<?php
for ($i = date("Y"); $i >= 1950; $i -= 1) {
?>
            <option value="<?php echo $i; ?>"<?php
            if ($_POST['nbareg_year'] == "$i")
               echo ' selected="selected"';
            ?>><?php echo $i; ?></option>
<?php
}
?>
         </select>

         <br>
         <label for="nbareg_email">email</label> <input type="text" name="nbareg_email" id="nbareg_email" value="<?php echo $_POST['nbareg_email']; ?>"><br>
         <label for="nbareg_password">password</label> <input type="password" name="nbareg_password" id="nbareg_password"><br>
         <label for="nbareg_verify">verify</label> <input type="password" name="nbareg_verify" id="nbareg_verify"><br>
         <input type="submit" value="register">
      </form>

      <input type="button" onclick="fadeout()" value="cancel">