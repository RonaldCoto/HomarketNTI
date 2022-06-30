<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Administración de productos</h1>

 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, precio, existencia, imagen, id_categoria, id_subcategoria FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo producto</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>                                
                                <th>Existencia</th> 
                                <th>Imagen</th> 
                                <th>ID Categoría</th>
                                <th>ID Subcategoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['precio'] ?></td>
                                <td><?php echo $dat['existencia'] ?></td>
                                <td><?php echo $dat['imagen'] ?></td>
                                <td><?php echo $dat['id_categoria'] ?></td>
                                <td><?php echo $dat['id_subcategoria'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formProductos">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="precio" class="col-form-label">Precio:</label>
                <input type="number" min="0" step="0.01" class="form-control" id="precio">
                </div>                
                <div class="form-group">
                <label for="existencia" class="col-form-label">Existencia:</label>
                <input type="number" class="form-control" id="existencia">
                </div>
                <div class="form-group">
                <label for="imagen" class="col-form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen">
                </div>
                <div class="form-group">
                <label for="id_categoria" class="col-form-label">ID Categoría:</label>
                    <select class="form-control" id="id_categoria">
                     <?php
                     $link = new mysqli("localhost","root","","bdd");

                    $consulta="SELECT * from  categoria";
                     $re=$link ->query($consulta);
                     while($fila=$re->fetch_assoc()){
                        echo " <option value='".$fila['id']."'>".$fila['nombre']."</option> \n" ;
                     }
                     ?>    
                </select>
                </div>
                <div class="form-group">
                <label for="id_subcategoria" class="col-form-label">ID Subcategoría:</label>
                    <select class="form-control" id="id_subcategoria">
                     <?php
                     $link = new mysqli("localhost","root","","bdd");

                    $consultaa="SELECT * from  subcategoria";
                     $ree=$link ->query($consultaa);
                     while($filaa=$ree->fetch_assoc()){
                        echo " <option value='".$filaa['id']."'>".$filaa['nombre']."</option> \n" ; 
                     }
                     ?>
                 </select>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->


<?php require_once "vistas/parte_inferior_2.php"?>