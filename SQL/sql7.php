<!DOCTYPE html>
<html>

<head>
	<title>SQL Injection</title>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
	<link rel="stylesheet" href="../Resources/button.css">
</head>

<body style="background: #2F3FB0; color: white;">

	<div style="background-color:#ffffff;color: #037BFE;border-radius: 30px;box-shadow: 0 0 1px 1px gray;padding: 10px;">
		<button type="button" name="homeButton" onclick="location.href='../homepage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Home Page</button>
		<button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Main Page</button>
	</div>

	<div align="center">
    <form role="form" action="sql7.php" method="get">
        <div class="col-lg-11">
            <div class="form-group" style="margin-top:10vh;">
                    <?php
                        if(isset($_GET["searchterm"]))
                        {
                            echo '<input class="form-control" placeholder="Search books" id="searchterm" name="searchterm" value="'.$_GET["searchterm"].'"/>';
                        }
                        else
                        {
                            echo '<input class="form-control" placeholder="Search books" id="searchterm" name="searchterm" value=""/>';
                        }
                    ?>
            </div>
        </div>
        <div class="col-lg-1">
        <p>Give me book's name and I give you...</p>
        <button type="submit" name="submit" value="Submit" class="button" style="margin-top: 30px;margin-bottom: 30px;">Submit</button>
            </div>

    </form>
	</div>
	<!--Admin password is in the secret table. I hope, anyone doesn't see it.-->
	<?php
        if(isset($_GET["searchterm"]))
        {
            //db connection
            $conn = new mysqli("localhost", "akshatvg", "qwerty") or die("error.");
            
            mysqli_select_db($conn, "books") or die("error.");
            
            $sql = "SELECT * FROM books.books WHERE title LIKE '%".$_GET["searchterm"]."%'";
            
            $books = mysqli_query($conn, $sql) or die("error.");
            
            //DEBUG
            /*echo $sql."<br />";

            while ($row = mysqli_fetch_object($books))
            {
                echo $row->id."  ";
                echo $row->title."<br />";
            };
            */
            $numresults = mysqli_num_rows($books);
            
            if($numresults == 0)
            {
                echo "No books exist with this pattern in the title.";
            }
            else
            {
                echo "$numresults books exist with this pattern in the title.";
            }
        }
    ?>
</body>

</html>