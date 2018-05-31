<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title><?php
        if(isset($title)){
            echo $title;
        }else {
            echo '<cms:if k_template_is_clonable><cms:if k_is_page><cms:show k_page_title /><cms:else /><cms:if k_is_folder><cms:show k_folder_title /><cms:else /><cms:show k_template_title /></cms:if></cms:if><cms:else /><cms:show k_template_title /></cms:if>';}?> | Fundacion Markoptic</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700,900" rel="stylesheet"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- <link href="/css/minify/style-fundacion.min.css" rel="stylesheet"> -->
    <link href="/css/style-fundacion.css" rel="stylesheet">
    <link href="/css/universal.css" rel="stylesheet">
    <link href="/css/minify/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="/css/jssocials-theme-flat.css" />

    <!-- google analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71345627-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-71345627-1');
    </script>