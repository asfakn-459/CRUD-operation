<html>
    <head>
        <title>Registration Form</title>
    </head>
    <body> 
        <?php
        if (isset($status)){
            echo $status;
        }
        ?>
        <h2> Registration Form</h2>
                    
        <form action="<?=base_url('register/savedata/')?>" method="post">
            <table cellspacing="20">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="stname"></td>
                </tr>   
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="stmail"></td>
                </tr>  
                <tr>
                    <td>Mobile</td>
                    <td><input type="number" name="stmobile"></td>
                </tr>  
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Register">
                        <button><a href="<?=base_url('register/fetchdata')?>">View Record</a></button>
                    </td>
                </tr>  
                
            </table>   
        </form>
    </body>
</html>