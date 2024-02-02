<!doctype html>
<html>
<header>
  <link rel="stylesheet" type="text/css" href="stylesheets/main.css" />
</header>

<body>
  <div id="conteneur">
    <h1>Les équipes de National League</h1>
    <table border="1">
      <tr>
        <td>ID</td>
        <td>Club</td>
      </tr>
      <?php
      require('ctrl.php');

      $ctrl = new Ctrl;

      function ajouteCelluleHTML($id, $contenu)
      {
        echo "<tr><td>$id</td><td>$contenu</td></tr>";
      }

      $equipes = $ctrl->getListeEquipes();
      $i = 0;
      foreach ($equipes as $equipe) {
        $i++;
        ajouteCelluleHTML($i, $equipe);
      }
      ?>
    </table>
  </div>
</body>

</html>