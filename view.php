<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Entradas</title>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex flex-column">
        <?php foreach ($listing as $item): ?>
            <div class="p-2">
                <div class="card mb-4" style="width: 40%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title"><?= htmlspecialchars($item['type_ticket']) ?></h5>
                                <p class="card-text">
                                    <span><?= htmlspecialchars($item['quantity_ticket']) ?></span><br>
                                    <span><?= htmlspecialchars($item['description']) ?></span><br>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <span class="h5"><?= htmlspecialchars($item['price']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>