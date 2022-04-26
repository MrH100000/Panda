    </div>
    <div class="footer">
        <div class="footer-content">
            
            <?php if(isset($_SESSION['loggedIn'])): ?>
                <form action="login.php" method="post">
				    <button type=submit name="logout" value="true"> Log Out </button>
			    </form>
            <?php endif; ?> 
            <p>ITS 362 - Panda Shop
            <br>
            David Higley - Danielle Turner
            <br>
            <?php echo date("Y"); ?></p>
        </div>
    </div>
    </div>
</body>
</html>
