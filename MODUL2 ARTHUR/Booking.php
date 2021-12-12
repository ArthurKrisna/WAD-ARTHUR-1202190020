     <!DOCTYPE html>
     <html lang="en">

     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <script>
               function setPicture() {
                    var banner = document.getElementById("tipe");
                    var value = banner.options[banner.selectedIndex].value;
                    $('img').attr("src", value);
               }
          </script>
          <?php
          if (empty($_GET['room'])) :
               $room = "Standard";
               $imgUrl = "Standard.jfif";
          else :
               $room = $_GET['room'];
          endif;

          if ($room == "Standard") :
               $imgUrl = "Standard.jfif";
          elseif ($room == "Superior") :
               $imgUrl = "Superior.jfif";
          elseif ($room == "Luxury") :
               $imgUrl = "Luxury.jfif";
          endif;
          ?>
          <title>Booking</title>
     </head>

     <body>
          <nav class="navbar navbar-expand-lg navbar-212121 bg-dark ">
               <div class="collapse navbar-collapse d-flex justify-content-center">
                    <div class="navbar-nav">
                         <a class="nav-item nav-link" href="home.php " >Home</a>
                         <a class="nav-item nav-link active" href="booking.php">Booking</a>
                    </div>
               </div>
          </nav>

          <div class="container d-flex justify-content-center p-4">
               <div class="row">
                    <div class="col-sm-6 mr-3">
                         <form action="myBooking.php" method="POST">
                              <div class="form-group">
                                   <label for="nama">Name</label>
                                   <input type="text" class="form-control" value="" name="nama">
                              </div>

                              <div class="form-group">
                                   <label for="nama">Event Date</label>
                                   <input type="date" class="form-control" name="check-in">
                              </div>

                              <div class="form-group">
                                   <label for="nama">Duration</label>
                                   <input type="number" class="form-control" name="duration">
                                   <p class="text-muted">Day(s)</p>
                              </div>

                              <div class="form-group ">
                                   <label for="room">Building Type</label>
                                   <?php if (empty($_GET['room'])) : ?>
                                        <select class="form-control" name="rooom" id="tipe" onchange="setPicture()">
                                             <option value="Standard.jfif">
                                                  Standard</option>
                                             <option value="Superior.jfif">
                                                  Superior</option>
                                             <option value="Luxury.jfif">
                                                  Luxury</option>
                                        </select>

                                   <?php else : ?>
                                        <input type="text" class="form-control" value=<?= $_GET['room'] ?> name="room" src readonly>
                                   <?php endif; ?>
                              </div>
                              
                              <div class="form-group">
                                   <label for="nomorhp">Phone Number</label>
                                   <input type="text" class="form-control" name="nomor">
                              </div>

                              <p class="mb-2">Add Service(s)</p>
                              
                              <div class="form-group">
                                   <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service1" value="catering">
                                        <label class="form-check-label" for="catering">
                                             Catering<p class="mb-0"><small>$ 20/Service</small></p>
                                        </label>
                                   </div>
                                   <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service2" value="dc">
                                        <label class="form-check-label" for="dc">
                                             Decoration<p class="mb-0"><small>$ 25/Service</small></p>
                                        </label>
                                   </div>
                                   <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service3" value="ss">
                                        <label class="form-check-label" for="ss">
                                             Extra service<p class="mb-0"><small>$ 30/Service</small></p>
                                        </label>
                                   </div>
                              </div>

                              
                              <button class="btn btn-block btn-dark" type="submit" value="kirim">Book</button>
                         </form>
                    </div>
                    <div class="col-sm-4 float-left">
                         <img src="<?= $imgUrl; ?>" onchange="setPicture()" alt="image-form" style="width:500px;">
                    </div>
               </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          <div class="card-footer text-muted text-center">
     Dibuat oleh Arthur_1202190020
     </div>
     </body>

     </html>