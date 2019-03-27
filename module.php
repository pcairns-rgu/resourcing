<?php
/**
* Created by PhpStorm.
* User: Pauline
* Date: 16/03/2019
* Time: 09:28
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Module Action List</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/table.css">

</head>
<!--- Main body --->
<body>
<div class="container">
    <header>
        <a href="index.php"><h2 class="logo">FORECAST</h2></a>
        <h1>Module Action List</h1>
        <p id=""><a href="">Module list</a></p>
        <p id=""><a href="">Nav to another page</a></p>

    </header>

    <main>
        <p>Things to do </p>



        <div class="container mt-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="collapse" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#menu1">Menu 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#menu2">Menu 2</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="collapse" ><br>
                    <h3>HOME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div id="menu1" class="collapse"><br>
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="menu2" class="collapse"><br>
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
            </div>
        </div>


        <br><br>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        <br><br>


        <table class="module">

            <tr>
                <th>Date</th>
                <th>Course</th>
                <th>Action</th>
                <th>Notes(status)</th>
                <th>Deadline</th>
                <th>Completed</th>
                <th>Delete</th>
                <th>Reallocate</th>
            </tr>
            <tr>
                <td>Today</td>
                <td>CMM004</td>
                <td>Set up page</td>
                <td>Started</td>
                <td>Now</td>
                <td>No</td>
                <td>Delete</td>
                <td>Reallocate</td>

            </tr>

        </table>
        <br><br>
    </main>
    <hr />
    <footer>
        <div class="connect">
            <p>FORECAST - FORESEE ORGANISE RESOURCE EFFICIENT COLLABORATE ACHIEVE SHARE TRANSFER </p>
            <p>Connect with us:</p>


            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_inline_follow_toolbox"></div>
        </div>
        <div class="bottom">
            <p>&copy; 2019 Pauline Cairns</p>
            <nav>
                <ul>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="t&c.html">T&Cs</a></li>
                    <li><a href="cookies.html">Cookies</a></li>
                </ul>
            </nav>
        </div>


    </footer>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
