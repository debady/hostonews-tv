<?php session_start();    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($titre)){echo $titre;} ?> </title>
    <style>
        /* Style général */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        header {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        header nav {
            margin-top: 10px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #d0eaff;
        }

        /* Formulaire */
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 20px auto;
            text-align: center;
        }

        .form-container h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: none;
            height: 100px;
        }

        .form-group input[type="file"] {
            display: none;
        }

        .upload-container {
            border: 2px dashed #007bff;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            background-color: #f1f9ff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .upload-container:hover {
            background-color: #e7f3ff;
            border-color: #0056b3;
        }

        .upload-container p {
            font-size: 14px;
            color: #333;
            margin: 10px 0;
        }

        .upload-container img {
            max-width: 100%;
            max-height: 200px;
            display: none;
            margin-top: 10px;
            border-radius: 8px;
        }

        .btn-submit {
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            text-align: center;
            margin-top: auto;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1> <?php if(isset($titre)){echo $titre;} ?> HostoNews </h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <div class="form-container">
        <h1><?php if(isset($titre)){echo $titre;} ?> </h1>
        <p>
            <?php 
            if( isset($_SESSION['alerte'])){
                echo  $_SESSION['alerte'];
                unset( $_SESSION['alerte']);
            }
            ?>

        </p>