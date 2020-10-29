<?php 
    session_start();
    include 'config.php';

    $update=FALSE;  // For the edit button on lines 78-94

    $id="";
    $name="";
    $email="";

    
    // Validation with REGEX (Add Record)
    if( isset($_POST['add']) ) {

        $name=$_POST['name'];
        $regex = "/^[a-zA-Z\i\-' ]{2,60}$/";
        if(preg_match($regex, $name)){
            ;
        }else{
            header('location:index.php');
            $_SESSION['name_err']='Please enter a valid name';
            $_SESSION['type']="danger";
            die();
        }

        $email=$_POST['email'];
        $regex = "/^[a-zA-Z\i\d\._]+@[a-zA-Z\i\d\._]+\.[a-zA-Z\i\.]{2,3}$/";
        if(preg_match($regex, $email)){
            ;
        }else{
            header('location:index.php');
            $_SESSION['email_err']='Please enter a valid email address';
            $_SESSION['type']="danger";
            die();
        }

    //End of Validation with REGEX (Add Record)
        
        // Prepared Statement
        $query="INSERT INTO crud(name,email)VALUES(?,?)";
        $stmt=$conn->prepare($query); 
        $stmt->bind_param("ss",$name,$email);
        $stmt->execute();

        header('location:index.php');
        $_SESSION['response']='Successfully inserted!';
        $_SESSION['res_type']="success";
    }
        

    if( isset($_GET['delete']) ) {
        $id=$_GET['delete'];
        
        // Prepared Statement
        $query="DELETE FROM crud WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        header('location:index.php');
        $_SESSION['response']='Successfully Deleted';
        $_SESSION['res_type']="danger";
    }


    if( isset($_GET['edit']) ){
        $id=$_GET['edit'];

        // Prepared Statement
        $query="SELECT * FROM crud WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];

        $update=TRUE;
    }

    // Validation with REGEX (Update Record)
    if( isset($_POST['update']) ){
        $name=$_POST['name'];
        $regex = "/^[a-zA-Z\i\-' ]{2,60}$/";
        if(preg_match($regex, $name)){
            ;
        }else{
            header('location:index.php');
            $_SESSION['name_err']='Please enter a valid name';
            $_SESSION['type']="danger";
            die();
        }

        $email=$_POST['email'];
        $regex = "/^[a-zA-Z\i\d\._]+@[a-zA-Z\i\d\._]+\.[a-zA-Z\i\.]{2,3}$/";
        if(preg_match($regex, $email)){
            ;
        }else{
            header('location:index.php');
            $_SESSION['email_err']='Please enter a valid email address';
            $_SESSION['type']="danger";
            die();
        }
    //End of validation with REGEX (Update record)

        $id=$_POST['id'];
        // Prepared Statement
        $query="UPDATE crud SET name=?,email=? WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("ssi",$name,$email,$id);
        $stmt->execute();

        $_SESSION['response']="Updated Succesfully!"; 
        $_SESSION['res_type']="primary";
        header('location:index.php');
    }
    
    // deatils.php
    if( isset($_GET['details']) ){
        $id=$_GET['details'];

        // Prepared Statement
        $query="SELECT * FROM crud WHERE id=?";
        $stmt=$conn->prepare($query); 
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $frame=$row['id'];
        $fname=$row['name'];
        $femail=$row['email'];
    }
    // End of deatils.php
// END