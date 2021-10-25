<?php
    #establish the conection
    $conn = mysqli_connect("localhost", "root", "", "php_blog");    
    if(!$conn){
        echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>
            Unable to establish conection
            </h3>";
    }


    #Create -> POST
    if(isset($_REQUEST["new_post"])){
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];
        $post_date = date(DATE_ATOM, mktime(0,0,0)); #Sends date of post to db with format yyy-mm-dd
    
        #sql query for inserting data into the db table
        $sql = "INSERT INTO blog_entry(title, content, post_date) VALUES('$title', '$content', '$post_date')";
        #passes the conection and the sql query to execute
        mysqli_query($conn, $sql);

        header("location: index.php?info=post_added");
        exit();
    }     

    #Read -> GET POSTS
    #Access the reslusts and pass them to the query variable    
    #$sql = "SELECT * FROM blog_entry"; //Select all from table xxxxx
    $sql = "SELECT * FROM blog_entry ORDER BY id DESC"; //Select all from table xxxxx  but display it reversed since the last post uploaded will be the first one to appear on the website  
    $query = mysqli_query($conn, $sql);

    #GET "view more" post
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM blog_entry WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }

    #Update -> UPDATE
    if(isset($_REQUEST['update_post'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];
        $post_date = date(DATE_ATOM, mktime(0,0,0)); //Sends date of post to db with format yyy-mm-dd        

        $sql = "UPDATE blog_entry SET post_date='$post_date', title='$title', content='$content' WHERE id=$id";
        mysqli_query($conn, $sql);
        header("location: index.php?info=post_updated");
        exit();
    }

    //Delete ->
    if(isset($_REQUEST['delete_post'])){
        $id = $_REQUEST['id'];     

        $sql = "DELETE FROM blog_entry WHERE id=$id";
        mysqli_query($conn, $sql);
        header("location: index.php?info=post_deleted");
        exit();
    }
