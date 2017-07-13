<?php include('studentserver.php') ?>
<!DOCTYPE html>
<html>
  <body>
    <div class ="header">
    <h1>Book your Tutor</h1>
  </div>
    <form  action="/bookings/studentindex.php" method="post">
      <select name="subject">
        <option disabled="disabled" selected="selected">Select a Subject</option>
        <option value="DBMS" name="dbms">DBMS</option>
        <option value="Java" name="java">Java</option>
        <option value="CO" name="co">CO</option>
  </select>
  <button type="submit" name="searchsubject" class="btn">OK</button>
    </form>


  </body>
</html>
<?php
  if(isset($_POST['searchsubject'])){
    $subject=$_POST['subject'];

    $sql2 = "SELECT tname FROM tutor
      WHERE tsub = '$subject'";
    $res=mysqli_query($db, $sql2);

    echo("<table>");
    $first_row = true;
    while ($row = mysqli_fetch_assoc($res)) {

        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<td>' . htmlspecialchars($field) ." " ;'</td>';
            echo '<button type="submit" name="book".$field."a"
            " class="btn">'."Book".'</button>';

            if (isset($_POST["book".htmlspecialchars($field)."a"])) {
              echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            }


        }
        echo '</tr>';
    }
    echo("</table>");
}



 ?>
