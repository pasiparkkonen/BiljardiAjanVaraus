<h1>Ajanvarauksen valinta</h1>
    <form action="ajavarauksenlisays.php" method="POST">
        <label for="selected_date">Select Date:</label>
        <input type="date" id="selected_date" name="selected_date" required><br>
        
        <label for="selected_time">Select Time:</label>
        <input type="time" id="selected_time" name="selected_time" required><br>
        
        <label for="selected_location">Select Location:</label>
        <input type="text" id="selected_location" name="selected_location" required><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        
        <input type="submit" value="Submit">
    </form>