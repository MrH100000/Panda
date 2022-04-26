    </div>
    <div class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <p>
                    ITS 362 - Panda Shop
                    <br>
                    David Higley - Danielle Turner
                    <br>
                    <?php echo date("Y"); ?>
                </p>
            </div>
            <div class="footer-right">
                <?php if(isset($_SESSION['loggedIn'])): ?>
                    <form action="login.php" method="post" class="footer-form">
                        <input type="hidden" name="logout">
                        <input type=submit value="Log Out" class="logout-button"/>
                    </form>
                <?php endif; ?> 
            </div>
        </div>
    </div>
    </div>
</body>
</html>
