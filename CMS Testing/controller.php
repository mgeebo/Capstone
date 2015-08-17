<?php

require_once("database.php");
require_once("blog_class.php");

if (isset($_GET['action'])){
    $action = $_GET['action'];
}else {
    $action = 'list';
}
//Object Oriented..WORKS!!

switch($action) {

    case "add_blog":
        $blog_post = new Blog(get_date_sql_format(),
            $_GET['blog_title'],
            $_GET['blog_image'],
            $_GET['blog_content']);

        //print $blog_post->get_blog_content();

        $blog_date = $blog_post->get_blog_date();
        $blog_title = $blog_post->get_blog_title();
        $blog_image = $blog_post->get_blog_image();
        $blog_content = $blog_post->get_blog_content();

        $sql = "INSERT INTO blogs (blog_post_date, blog_title, blog_image, blog_content)
                      VALUES ('$blog_date', '$blog_title', '$blog_image', '$blog_content')";

        $query = $db->prepare($sql);
        $query->execute();

        break;

    case "add_image":
        $add_image = new Image(get_date_sql_format(),
            $_GET['image_title'],
            $_GET['image_type'],
            $_GET['image_tags'],
            $_GET['image']);

        $image_date = $add_image->get_image_date();
        $image_title = $add_image->get_image_title();
        $image_type = $add_image->get_image_type();
        $image_tags = $add_image->get_image_tags();
        $image = $add_image->get_image();

        $sql = "INSERT INTO images (image_upload_date, image_title, image_type, image_tags, image)
                        VALUES ('$image_date', '$image_title', '$image_type', '$image_tags', '$image')";

        $query = $db->prepare($sql);
        $query->execute();

        break;
}


/*NON OOP
$blog_date = get_date_sql_format();
$blog_title = $_GET['blog_title'];
$blog_image = $_GET['blog_image'];
$blog_content = $_GET['blog_content'];


$sql = "INSERT INTO blogs (blog_post_date, blog_title, blog_image, blog_content)
                  VALUES ('$blog_date','$blog_title', '$blog_image', '$blog_content')";

$query = $db->prepare($sql);
$query->execute();

echo "added";

*/


/*if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    echo "Didn't work";
}

switch($action){

    case "add_bl":
        new Blog(get_blog_date(),
                $_POST['blog_title'],
                $_POST['blog_image'],
                $_POST['blog_content']
        );
        $query = $db->prepare("INSERT INTO blogs (blog_post_date, blog_title, blog_image,blog_content)
                  VALUES ('$this->date', '$this->title', '$this->image', '$this->content')");
        $query->execute();

        break;

    case "add_blog":

        $blog_title = $_GET['blog_title'];
        echo $blog_title;

        $sql = "INSERT INTO blogs (blog_title)
                  VALUES ('$blog_title')";

        $query = $db->prepare($sql);
        $query->execute();
        echo "added";

        break;
}
*/