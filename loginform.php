<?php

    include 'class.php';
?>

<!DOCTYPE html>
<html lang="en">
    <!--  -->
<head>
    <title>login form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <script>
        function newpage()
        {
            location.href="signupform.php";
        }
        // function check()
        // {
        //     const usernameValue=frm.username.value.trim();
        //     const passwordValue=frm.password.value.trim();    

        //     if(usernameValue=="")
        //     {
        //         setErrorFor(username,"Username cannot be blank.");
        //         frm.username.focus();
        //         return false;
        //     }
        //     else if(checkUsername(usernameValue))
        //     {
        //         setErrorFor(username,"Special characters are not aloud in username.");
        //         frm.username.focus();
        //         return false;
        //     }
        //     else
        //     {
        //         setSuccessFor(username);
        //     }

        //     if(passwordValue=="")
        //     {
        //         setErrorFor(password,"Password cannot be blank.");
        //         frm.password.focus();
        //         return false;
        //     }
        //     else if(!checkPassword(passwordValue))
        //     {
        //         setErrorFor(password,"Password must contain atleast one small letter.");
        //         frm.password.focus();
        //         return false;
        //     }
        //     else if(!checkPassword1(passwordValue))
        //     {
        //         setErrorFor(password,"Password must contain atleast one capital letter.");
        //         frm.password.focus();
        //         return false;
        //     }
        //     else if(!checkPassword2(passwordValue))
        //     {
        //         setErrorFor(password,"Password must contain atleast one spacial character.");
        //         frm.password.focus();
        //         return false;
        //     }
        //     else if(!checkPassword3(passwordValue))
        //     {
        //         setErrorFor(password,"Password must contain atleast two digit.");
        //         frm.password.focus();
        //         return false;
        //     }
        //     else if(!checkPassword4(frm.password))
        //     {
        //         setErrorFor(password,"Password must contain atleast 8 character.");
        //         frm.password.focus();
        //         return false;
        //     }
        //     else
        //     {
        //         setSuccessFor(password);
        //     }
        // }
        // function setErrorFor(input,message)
        // {
        //     const formControl=input.parentElement;
        //     const small=formControl.querySelector("small");
        //     small.innerText=message;
        //     if(input==password)
        //         formControl.className="form-control errorpassword";
        //     else
        //         formControl.className="form-control error";
        // }
        // function setSuccessFor(input,message)
        // {
        //     const formControl=input.parentElement;
        //     formControl.className="form-control";
        // }
        // function checkUsername(username)
        // {
        //     return /\W/.test(username);
        // }
        // function checkPassword(password)
        // {
        //     return /[a-z]+/.test(password);
        // }
        // function checkPassword1(password)
        // {
        //     return /[A-Z]+/.test(password);
        // }
        // function checkPassword2(password)
        // {
        //     return /\W+/.test(password);
        // }
        // function checkPassword3(password)
        // {
        //     return /[0-9]{2}/.test(password);
        // }
        // function checkPassword4(password)
        // {
        //     if(password.value.length>=8)
        //         return true;
        //     return false;
        // }
    </script>
</head>
<body>
    <section id="banner">
        <div id="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="buttons">Login</button>
                <button type="button" class="buttons" onclick="newpage()">Sign Up</button>
            </div><br><br><br><br>
            <!-- <div class="social">
                <div class="go"><i class="fab fa-google"></i>  Google</div>
                <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
            </div> -->
            <form class="form" id="form" name="frm">
                <div class="form-control">
                    <label for="username">Email</label>
                    <input type="text" name="email" id="email" placeholder="email">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error massege</small>
                </div>
                <div class="form-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error massege</small>
                </div>
                <button type="button" class="submit-btn" id="login-btn">Login</button>
            </form>
        </div>
    </section>

    
    <script>
        $('#login-btn').click(function(){
    
            let email = $('#email').val();
            let pass = $('#password').val();

            console.log(email);
            console.log(pass);
            $.ajax(
        {
            method: "POST",
            url:"http://localhost/Competition/select_signup.php",
            
            data:
            {
                
                email: email,
                pass: pass
                
            }
        }).done(function(msg){
                console.log(msg);
                            
                if(msg=="true")
                {
                    window.location.assign("http://localhost/Competition/Dashboard.php");   
                }
                else{
                    alert("Entered data is not true");
                }
            });
        });

    </script>
</body>
</html>
    