<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Calzado</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
    }
    
    form {
      max-width: 400px;
      margin: 0 auto;
    }
    
    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    
    input[type="submit"],
    input[type="button"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }
    
    input[type="submit"]:hover,
    input[type="button"]:hover {
      background-color: #45a049;
    }
    
    #results {
      margin-top: 20px;
      border-collapse: collapse;
      width: 100%;
    }
    
    #results td, #results th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #results th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Formulario de Calzado</h1>
  
  <form id="shoeForm">
    <input type="text" id="brand" placeholder="Marca" required>
    <input type="text" id="model" placeholder="Modelo" required>
    <input type="number" id="size" placeholder="Talla" required>
    <input type="submit" value="Guardar">
  </form>
  
  <table id="results">
    <tr>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Talla</th>
      <th>Acciones</th>
    </tr>
    <?php
      // Establecer conexión a la base de datos PostgreSQL
      $conn = pg_connect("host=127.0.0.1 dbname=db_calzados user=postgres password=1234");
      
      // Realizar consulta para recuperar los registros de calzado
      $query = "SELECT * FROM calzados";
      $result = pg_query($conn, $query);
      
      // Generar filas de la tabla con los registros obtenidos
      while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['marca']."</td>";
        echo "<td>".$row['modelo']."</td>";
        echo "<td>".$row['talla']."</td>";
        echo "<td><input type='button' value='Editar' onclick='editRow(this)'> <input type='button' value='Eliminar' onclick='deleteRow(this)'></td>";
        echo "</tr>";
      }
      
      // Cerrar la conexión a la base de datos
      pg_close($conn);
    ?>
  </table>
  
  <script>
    // Variables globales
    var shoeForm = document.getElementById("shoeForm");
    var resultsTable = document.getElementById("results");
    
    // Agregar evento submit al formulario
    shoeForm.addEventListener("submit", function(event) {
      event.preventDefault(); // Evita el envío del formulario
      
      var brand = document.getElementById("brand").value;
      var model = document.getElementById("model").value;
      var size = document.getElementById("size").value;
      
      // Validar que los campos no estén vacíos
      if (brand && model && size) {
        // Crear nueva fila en la tabla
        var newRow = resultsTable.insertRow(-1);
        
        // Insertar celdas en la fila
        var brandCell = newRow.insertCell(0);
        var modelCell = newRow.insertCell(1);
        var sizeCell = newRow.insertCell(2);
        var actionsCell = newRow.insertCell(3);
        
        // Agregar contenido a las celdas
        brandCell.innerHTML = brand;
        modelCell.innerHTML = model;
        sizeCell.innerHTML = size;
        actionsCell.innerHTML = "<input type='button' value='Editar' onclick='editRow(this)'> <input type='button' value='Eliminar' onclick='deleteRow(this)'>";
        
        // Limpiar los campos del formulario
        shoeForm.reset();
      }
    });
    
    // Función para editar una fila
    function editRow(button) {
      var row = button.parentNode.parentNode;
      var brandCell = row.cells[0];
      var modelCell = row.cells[1];
      var sizeCell = row.cells[2];
      
      var brandInput = document.createElement("input");
      brandInput.type = "text";
      brandInput.value = brandCell.innerHTML;
      
      var modelInput = document.createElement("input");
      modelInput.type = "text";
      modelInput.value = modelCell.innerHTML;
      
      var sizeInput = document.createElement("input");
      sizeInput.type = "number";
      sizeInput.value = sizeCell.innerHTML;
      
      brandCell.innerHTML = "";
      brandCell.appendChild(brandInput);
      
      modelCell.innerHTML = "";
      modelCell.appendChild(modelInput);
      
      sizeCell.innerHTML = "";
      sizeCell.appendChild(sizeInput);
      
      button.value = "Guardar";
      button.onclick = function() {
        brandCell.innerHTML = brandInput.value;
        modelCell.innerHTML = modelInput.value;
        sizeCell.innerHTML = sizeInput.value;
        button.value = "Editar";
        button.onclick = function() {
          editRow(button);
        };
      };
    }
    
    // Función para eliminar una fila
    function deleteRow(button) {
      var row = button.parentNode.parentNode;
      resultsTable.deleteRow(row.rowIndex);
    }
  </script>
</body>
</html>
