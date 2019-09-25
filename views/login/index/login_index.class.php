<?php
class LoginIndex extends IndexView{
    //put your code here
    public function display(){
        Session::create();
        parent::displayHeader();
        ?>
<style>
    .login_form{
        margin: 2px;
        width: 300px;
        height: 300px;
        border: 1px solid black;
        background-color: cadetblue;
        padding: 5px;
    }
    #signin{
        display: none;
    }
    #signin form{
        position: relative;
        right: 10px;
    }
    #sigin input[type='submit']{
        position: relative;
        left: 5px;
    }
    #signup form{
        position: relative;
        right: 10px;
    }
    #signup input[type='submit']{
        position: relative;
        left: 5px;
    }
    #chooseForm{
        margin: 15px;
        border: none;
        width: 80px;
        background-color: gray;
    }
    #chooseForm:hover{
        background-color: slategray;
    }
    #logoutDiv{
        width: 250px;
        height: 250px;
        border: 1px solid black;
        background-color: cadetblue;
        display: none;
    }
    #logoutBtn{
        margin: 10px;
        border: none;
        width: 30px;
        background-color: gray;
    }
    #logoutBtn:hover{
        background-color: slategray;
    }
    .logoutOpt{
        margin: 10px;
        border: none;
        width: 30px;
        background-color: gray; 
        display: none;
    }
    .logoutOpt:hover{
        background-color: slategray;        
    }
</style>

<?php if(!isset($_SESSION['user_email'])){?>
    <div class="login_form" id="signin">
            <form action="<?=BASE_URL?>/login/signin" method="post">
                <table>
                        <tr>
                            <th></th>
                            <td>Username <input type="text" name="user_name" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Password <input type="password" name="user_pass" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submitBtn" value="Submit"></td>
                        </tr>               
                </table>
            </form>
    </div>
    <div class="login_form" id="signup">
            <form action="<?=BASE_URL?>/login/signup" method="post">
                <table>
                    <!-- Format text fields-->
                  <!--  <form method="post" action="<?=BASE_URL?>/login/signup">-->
                        <tr>
                            <th></th>
                            <td>Email <input type="email" name="user_email" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Username <input type="text" name="user_name" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Password <input type="password" name="user_pass" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submitBtn" value="Submit"></td>
                        </tr>
                    </form>
                </table>
            </form>
    </div>  
<input type="button" id="chooseForm" value="">
<script>
    var signin = document.getElementById("signin");
    var signup = document.getElementById("signup");
    var chooseForm = document.getElementById("chooseForm");
    chooseForm.value="Sign In";
    function chooseLoginForm(){
        if(signup.style.display != "none"){
            signup.style.display = "none";
            signin.style.display = "block";
            chooseForm.value = "Sign Up";
        }else{
            signin.style.display = "none";
            signup.style.display = "block";
            chooseForm.value = "Sign In";
        }
    }
    chooseForm.addEventListener("click", chooseLoginForm);
</script>
<?php }else{?>
    <div>Already logged in</div>
    <input type="button" id="logoutBtn" value="Log out">
    <a href="<?=BASE_URL?>/login/logout"><input type="button" class="logoutOpt" value="Yes"></a>
    <input type="button" class="logoutOpt" value="No">
    <script>
     var logoutBtn = document.getElementById("logoutBtn");
     var logoutOpt = document.getElementsByClassName("logoutOpt");
     
     
     function chooseLogout(){
        logoutBtn.style.display = "none";
        logoutOpt[0].style.display = "block";
        logoutOpt[1].style.display = "block";
    }
    function confirmLogout(e){
        if(e.target.value == "No"){
            logoutBtn.style.display = "block";
            logoutOpt[0].style.display = "none";
            logoutOpt[1].style.display = "none";   
       }
    }
    logoutBtn.addEventListener("click", chooseLogout);
    logoutOpt[0].addEventListener("click", confirmLogout);
    logoutOpt[1].addEventListener("click", confirmLogout);
    </script>
<?php }?>
        <?php
        parent::displayFooter();
    }
}
