<?php
session_start();

require_once "../model/utilisateur.php";

$newuser = new Utilisateur();
$newuser->set_db();
$ok = $newuser->get_all();

if ($ok != NULL) {
  echo '<table>
    <tr>
      <th>Username</th>
      <th>Pen Name</th>
      <th>Permissions</th>
      <th>Options</th>
    </tr>';

  while ($row = $ok->fetch(PDO::FETCH_ASSOC)) {
    if ($row['Signification'] == "User") {
      $dr = '<select name="droit">
      <option value="1">User</option>
      <option value="2">Mod</option>
      <option value="3">Admin</option>
      </select><input type="hidden" name="curdroit" value="1">';
    }
    elseif ($row['Signification'] == "Mod") {
      $dr = '<select name="droit">
      <option value="2">Mod</option>
      <option value="1">User</option>
      <option value="3">Admin</option>
      </select><input type="hidden" name="curdroit" value="2">';
    }
    else {
      $dr = '<select name="droit">
      <option value="3">Admin</option>
      <option value="2">Mod</option>
      <option value="1">User</option>
      </select><input type="hidden" name="curdroit" value="3">';
    }

    echo '<tr>
    <td>'.$row['Login'].'</td>
    <td>'.$row['Pseudo'].'</td>
    <td><form action="../controller/moddroits.php" method="post">'.$dr.'<input type="hidden" name="usrlog" value="'.$row['Login'].'"><input type="submit" id="buttab"  name="Mod" value="Modify"></form></td>
    <td><form action="../controller/supuser.php" method="post"><input type="hidden" name="usrlog" value="'.$row['Login'].'"><input type="submit" id="opt" name="Sup" value="Delete">
    </form></td>
    </tr>';
  }

  echo '</table>';
}

?>
