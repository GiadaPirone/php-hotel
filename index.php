<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <title>PHP HOTEL</title>
</head>
<body>
    
    <?php

        $hotels = [

            [
                'name' => 'Hotel Belvedere',
                'description' => 'Hotel Belvedere Descrizione',
                'parking' => true,
                'vote' => 4,
                'distance_to_center' => 10.4
            ],
            [
                'name' => 'Hotel Futuro',
                'description' => 'Hotel Futuro Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 2
            ],
            [
                'name' => 'Hotel Rivamare',
                'description' => 'Hotel Rivamare Descrizione',
                'parking' => false,
                'vote' => 1,
                'distance_to_center' => 1
            ],
            [
                'name' => 'Hotel Bellavista',
                'description' => 'Hotel Bellavista Descrizione',
                'parking' => false,
                'vote' => 5,
                'distance_to_center' => 5.5
            ],
            [
                'name' => 'Hotel Milano',
                'description' => 'Hotel Milano Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 50
            ],

        ];

        $filtroParcheggio = $_GET["conParcheggio"];
        $filtroPerVoto = $_GET["perVoto"];
        

        $hotelsFiltrati =[];

        foreach ($hotels as $hotel) {
            if($hotel["vote"] >= $filtroPerVoto){
                
                if( $filtroParcheggio){

                    if( $hotel["parking"]){
                        $hotelsFiltrati[]= $hotel;
                    }
                } else {
                    $hotelsFiltrati[]= $hotel;
                }
                
            }
        }
        $hotels = $hotelsFiltrati;


       


      
        
        var_dump($filtroPerVoto);

        

        

    
       
    ?>



    <div class="container ">
        <div class="row">
            <h1>Tabella degli hotel</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">

                <form action="./index.php" method="GET">
                    <input class="form-check-input" type="radio" name="conParcheggio" id="parcheggio">
        
                    <label class="form-check-label" for="parcheggio">
                         con parcheggio
                    </label>

                    <select name="perVoto" id="voto">
                        <option >1</option>
                        <option >2</option>
                        <option >3</option>
                        <option >4</option>
                        <option >5</option>
                    </select>
                    <label class="form-check-label" for="voto">
                         filtra tramite voto
                    </label>

                    <button type="submit">Invia</button>
                </form>

                

            </div>
        </div>
    </div>


    <div class="container colorPrimary">
        <div class="row">
            <div class="col">
                <table class="table text-white" >

                    <thead>
                        <tr>

                            <?php foreach ($hotels[0] as $key => $value){ ?>
                            <th scope="col"><?php echo $key ?></th>
                            <?php } ?>
                           
                        </tr>
                    </thead>

                    <?php foreach($hotels as $hotel){ 
                            $parcheggio = $hotel["parking"] ? "si" : "no"
                        
                        ?>

                    <tbody>
                        <tr>
                            <td><?php echo $hotel["name"] ?></td>
                            <td><?php echo $hotel["description"] ?></td>
                            <td><?php echo $parcheggio ?> </td>
                            <td><?php echo $hotel["vote"] ?></td>
                            <td><?php echo $hotel["distance_to_center"] ?>
                        </tr>
                    </tbody>

                    <?php } ?>
                </table>

            </div>
        </div>
       
    </div>


        
   


    
</body>
</html>