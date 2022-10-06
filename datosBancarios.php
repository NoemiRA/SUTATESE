<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE - Datos Bancarios</title>
    <?php include("navbar.php");
    ?>
    
</head>

<body>
    <div class="row g-0 p-5 w-75 bg-light mx-auto text-center my-5">
    <div class="text-center">
        <img src="resources/tj.png" class="rounded mx-auto d-blockmx-auto d-block w-25" alt="...">
    </div>
        
        <h1 class="my-3">DATOS BANCARIOS</h1>
        <div class="col p-3">
            <label for="titular" class="form-label">Nombre TITULAR</label>
            <input type="text" class="form-control text-center" id="titular" placeholder="NOEMI RUIZ AGATÓN" disabled>
        </div>
        <div class="col p-3">
            <div class="form-group">
                <label for="Banco" class="form-label">Institución Bancaria</label>
                <select class="form-control" id="Banco">
                    <option selected>Elige una institución Bancaria...</option>
                    <option>BBVA México</option>
                    <option>Santander</option>
                    <option>Banorte</option>
                    <option>Banamex</option>
                    <option>Scotiabank</option>
                    <option>Inbursa</option>
                    <option>HSBC</option>
                    <option>Banco Azteca</option>
                    <option>BanCoppel</option>
                    <option>Banco del Bajío</option>
                    <option>Compartamos</option>
                    <option>Banregio</option>
                    <option>Sabadell</option>
                </select> 
            </div>
        </div>
        <div class="p-3">
            <label for="clabe" class="form-label">No. CLABE</label>
            <div class="input-group">
                <input type="text" class="form-control text-center" id="clabe" placeholder="XXXXXX - XXXXXX - XXXXXX"/>
                <span class="input-group-text" id="basic-addon2">
                    <abbr title="El número de cuenta son 18 dígitos, en caso de que el banco sea Banorte el número de cuenta son 10 dígitos "><i class="fa-solid fa-circle-info"></i></abbr>
                </span>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-secondary boton-ingresar" onclick="history.go(-1);">
                Cancelar
            </button>
            <button type="button" class="btn btn-outline-secondary" onclick=location.href="inicio.php">
                Aceptar
            </button>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>