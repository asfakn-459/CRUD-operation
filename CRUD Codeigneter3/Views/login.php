<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form>
            <table cellspacing="20">
                  
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="stmail"></td>
                </tr>  
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="stmobile"></td>
                </tr>  
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Login"></td>
                </tr>  
                <tr>
                    <td></td>
                    <td><a href="<?= base_url('Register/student') ?>">New Registration</a></td>
                </tr>
            </table>   
        </form>
    </body>
</html>