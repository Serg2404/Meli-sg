<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <title>App Mercadolibre</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="container form-container" style="margin-top:50px;">
    <div class="col-12">
    <div id="state"></div>
        <form class="form" action="getSellerInfo.php" method="get">
            <div class="form-group">
              <label for="sellerId">Seller ID</label>
              <input name="sellerId" type="number" class="form-control" id="sellerId" aria-describedby="sellerIdHelp" placeholder="">
              <small id="sellerIdHelp" class="form-text text-muted">179571326</small>
            </div>
            <div class="form-group">
              <label for="paisCombo">Pais</label>
              <input name="paisCombo" type="text" class="form-control" id="paisCombo" value="MLA">
            </div>
            <button id="boton-buscar" type="submit" name="button" value="Button" class="btn btn-primary">Buscar</button>
          </form>  
    </div>
</div>

</body>
</html>