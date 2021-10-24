<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <title>myBooking</title>
</head>

<body>
     <?php
     error_reporting(E_ERROR | E_PARSE);
     $idNumber = rand(600000, 700000);
     $nama = $_POST['nama'];
     $checkIn = $_POST['checkin'];
     $duration = $_POST['duration'];
     $checkOut = $checkIn . " + " . $duration . " days";
     $room = $_POST['room'];
     $phone = $_POST['nomor'];

     if ($room == "Standard.jfif") :
          $room = 'Standard';
     elseif ($room == "Superior.jfif") :
          $room = 'Superior';
     elseif ($room == "Luxury.jfif") :
          $room = 'Luxury';
     endif;

     if ($room == "Standard") :
          $total = 1000 * $duration;
     elseif ($room == "Superior") :
          $total = 1500 * $duration;
     elseif ($room == "Luxury") :
          $total = 5000 * $duration;
     endif;

     if (empty($_POST['service1']) and empty($_POST['service2']) ) :
          $serv1 = "-";
          $serv2 = "-";
          $servShow = "no service";
     endif;

     if (!empty($_POST['service1']) and !empty($_POST['service2']) ) :
          $servShow = "catering & dc";
          $total += 45;
     endif;

     if (empty($_POST['service1']) and !empty($_POST['service2'])):
          $serv1 = "-";
          $servShow = "dc";
          $total += 25;
     endif;

     if (empty($_POST['service2']) and !empty($_POST['service1'])):
          $serv2 = "-";
          $servShow = "catering";
          $total += 20;
     endif;
     if (!empty($_POST['service1']) and !empty($_POST['service2']) and !empty($_POST['service3']) ) :
          $servShow = "catering & dc & ss";
          $total += 75;
     endif;

     if (empty($_POST['service1']) and empty($_POST['service2']) and !empty($_POST['service3']) ):
          $serv3 = "ss";
          $servShow = "ss";
          $total += 30;
     endif;


     ?>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="collapse navbar-collapse d-flex justify-content-center">
               <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Home.php ">Home</a>
                    <a class="nav-item nav-link active" href="Booking.php">Booking</a>
               </div>
          </div>
     </nav>
     <br><br>
     <div class="container d-flex justify-content-center">
          <table class="table table-striped">
               <tr>
                    <th>Booking Number</th>
                    <th>Name</th>
                    <th>Check-in</th>
                    <th>check-out</th>
                    <th>Building Type</th>
                    <th>Phone Number</th>
                    <th>Service</th>
                    <th>Total Price</th>
               </tr>
               <tr>
                    <td class="font-weight-bold"><?= $idNumber ?></td>
                    <td><?= $nama ?></td>
                    <td><?= date('d/m/Y', strtotime($checkIn)) ?></td>
                    <td><?= date('d/m/Y', strtotime($checkOut)) ?></td>
                    <td><?= $room; ?></td>
                    <td><?= $phone ?></td>
                    <td><?= $servShow ?></td>
                    <td>$ <?= $total ?></td>
               </tr>
          </table>
     </div>
     <div class="card-footer text-muted text-center">
    dibuat oleh Arthur_1202190020
  </div>
</body>

</html>