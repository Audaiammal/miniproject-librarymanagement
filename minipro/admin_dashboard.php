<!DOCTYPE html>
<html lang="'en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <style>
            .navbar{
                background-color:navy !important;
            }
            .nav-link{
                color:white !important;
            }
            .nav-link:hover{
                color: skyblue !important; 
            }
            .navbar-brand{
                color:white !important;
            }
             .navbar-brand:hover{
                color:skyblue !important;
            } 
            .navbar-nav{
                flex-grow: 1;
                    justify-content:space-evenly;}
            
            #carouselArea{
                display:none;
                margin-top:20px;
            }         
            .add-user-heading{
                color: navy;
                cursor: pointer;
                margin:0;
                padding:10px 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
           <div class="container-fluid">
               <a class="navbar-brand" href="#">SPKC Library</a>
               <button class="navbar-toggler" type="button"
                   data-toggle="collapse"
                   data-target="#navbarNav"
                   aria-controls="navbarNav"
                   aria-expanded="false"
                   aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                   <ul class="navbar-nav">
                       <li class="nav-item">
                           <a class="nav-link" href="#" aria-current="page" id=homeNavItem>Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#" id="userNavItem">User</a>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Transaction</a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="issued_books.php" >Issued Books</a>
                                 <a class="dropdown-item" href="view_returned_books.php">View Returned Books</a>
                                 <a class="dropdown-item" href="view_borrowed_books.php"> View Borrow Request</a>
                            </div>
                        </li>
                        <li  class="nav-item">
                            <a class="nav-link" href="#" id="memberNavItem">Member</a>
                        </li>
                        <li  class="nav-item">
                            <a class="nav-link" href="#" id="bookNavItem">Book</a>
                        </li>
                        <!-- <li  class="nav-item">
                            <a class="nav-link" href="#">Search</a>
                        </li> -->
                        <li  class="nav-item">
                           <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <div id="carouselArea" class="container">
            <?php include 'scrollpic.php';?>

        </div>
        
        <div id="userArea" class="container"></div>
        <div id="bookArea" class="container"></div>
        <div id="memberArea" class="container"></div>

   
        <script>
            $(document).ready(function(){
                $('#homeNavItem').on('click',function(event){
                    event.preventDefault();
                    $('#carouselArea').show();
                    $('#userArea').hide(); 
                    $('#bookArea').hide(); 
                    $('#memberArea').hide(); 



                });
                $('#userNavItem').on('click',function(event){
                    event.preventDefault();
                    $('#carouselArea').hide();
                    $('#bookArea').hide();
                    $('#memberArea').hide(); 



                    $('#userArea').html(`
                      <h3 class="add-user-heading" onclick="location.href='adduser.php';">ADD USER</h3>
                      <div id="userList"> </div>
                    `);

                    $('#userList').load('listuser.php');
                    $('#userArea').show();
                });
                $('#bookNavItem').on('click',function(event){
                    event.preventDefault();
                    $('#carouselArea').hide();
                    $('#userArea').hide();
                    $('#memberArea').hide(); 


                    

                    $('#bookArea').html(`
                      <h3 class="add-book-heading" onclick="location.href='addbook.php';">ADD BOOK</h3>
                      <div id="bookList"> </div>
                    `);

                    $('#bookList').load('listbook.php');
                    $('#bookArea').show();
                });
                $('#memberNavItem').on('click',function(event){
                    event.preventDefault();
                    $('#carouselArea').hide();
                    $('#userArea').hide();
                    $('#bookArea').hide();

                    

                    $('#memberArea').html(`
                      <div id="memberList"> </div>
                    `);

                    $('#memberList').load('memberlist.php');
                    $('#memberArea').show();
                });

                $('#navbarDropdown').on('click', function(event) {
                   event.preventDefault(); 
                   $(this).next('.dropdown-menu').toggle(); 
                });

                $(document).on('click', function(event) {
                   if (!$(event.target).closest('.dropdown').length) {
                       $('.dropdown-menu').hide(); 
                   }
                });

               $('#homeNavItem').trigger('click');
               });        
        </script>
    </body>
</html>