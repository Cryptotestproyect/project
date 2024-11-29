<?php
include("../templates/header.php");
?>
<head>
    <title>Panel del Administrador</title>
</head>
<h1>Verificación de Pagos</h1>


<form method="GET" action="">
    <input type="text" name="buscar" placeholder="Buscar por nombre o referencia" class="form-control w-50 mb-3" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<?php
require 'ConexionBD.php';


$sql = "SELECT * FROM transacciones";


if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $sql .= " WHERE nombre LIKE '%$buscar%' OR referenciabancaria LIKE '%$buscar%'";
}


$result = $conn->query($sql);
?>

<table class="table table-bordered border-black ">
  <thead>
    <tr>
      <th class="text-center align-middle" scope="col">ID</th>
      <th class="text-center align-middle" scope="col">Nombre</th>
      <th class="text-center align-middle" scope="col">Email</th>
      <th class="text-center align-middle" scope="col">Telefono</th>
      <th class="text-center align-middle" scope="col">Metodo de Pago</th>
      <th class="text-center align-middle" scope="col">Referencia</th>
      <th class="text-center align-middle" scope="col">Estado Cliente</th>
      <th class="text-center align-middle" scope="col">Estado Admin</th>
      <th class="text-center align-middle" scope="col">Acciones</th>
      <th class="text-center align-middle" scope="col">Ver Imagen</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row): ?>
    <tr>
      <th class="text-center align-middle" scope="row"><?php echo $row["id"]; ?></th>
      <td class="text-center align-middle"><?php echo $row["nombre"]; ?></td>
      <td class="text-center align-middle"><?php echo $row["email"]; ?></td>
      <td class="text-center align-middle"><?php echo $row["telefono"]; ?></td>
      <td class="text-center align-middle"><?php echo $row["metododepago"]; ?></td>
      <td class="text-center align-middle"><?php echo $row["referenciabancaria"]; ?></td>
      <td class="text-center align-middle"><?php echo $row["estadoAdmin"]; ?></td>
      <td class="text-center align-middle">
        <form action='adminEstado.php' method='POST'>
            <input type='hidden' name='id' value="<?php echo $row["id"]; ?>">
            <select name='estadoAdmin' class="form-select w-75">
                <option value='aprobado' <?php echo $row["estadoAdmin"] == 'aprobado' ? 'selected' : ''; ?>>Aprobar</option>
                <option value='rechazado' <?php echo $row["estadoAdmin"] == 'rechazado' ? 'selected' : ''; ?>>Rechazar</option>
                <option value='en espera' <?php echo $row["estadoAdmin"] == 'en espera' ? 'selected' : ''; ?>>Mantener en espera</option>
            </select>
            <td class="text-center align-middle"><input type='submit' value='Actualizar' class="btn btn-success text-white"></td>
        </form>
      </td>
      <td class="text-center align-middle">
          <a href="/servi/procesador/pestanaimagen.php?referencia=<?php echo urlencode($row['referenciabancaria']); ?>" class="btn btn-info">Ver Imagen</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
$conn->close();
?>