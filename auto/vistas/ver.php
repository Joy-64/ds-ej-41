<?php require_once '../../modelo/auto.php'; 
$id = $_GET['id'] ?? null;
$Auto = $id ? Auto::obtenerPorId($id) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Auto</h1>

                <?php if ($Auto): ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $Auto->Id; ?></p>
                        <p><strong>Marca:</strong> <?php echo $Auto->Marca; ?></p>
                        <p><strong>Modelo:</strong> <?php echo $Auto->Modelo; ?></p>
                        <p><strong>Rodado:</strong> <?php echo $Auto->Rodado; ?></p>
                        <p><strong>CantidadCambios:</strong> <?php echo $Auto->CantidadCambios; ?></p>
                        <p><strong>Color:</strong> <?php echo $Auto->Color; ?></p>
                        <p><strong>Precio:</strong> <?php echo $Auto->Precio; ?></p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                    <a href="editar.php?id=<?php echo $Auto->Id; ?>" class="btn btn-warning">Editar</a>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Auto no encontrada</div>
                <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
