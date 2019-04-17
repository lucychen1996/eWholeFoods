<?php 

require 'usernavbar.php';
require 'config.php';

?>

<form name="shipping" action="confirmation.php" method="POST">
    <h4> Shipping Information</h4>
    <p class="error"> <?php echo $error;?> </p>
    <div class="form-group">
        <label>Address Street</label>
        <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder=" Enter City" required>
    </div>
    <label for="exampleInputPassword1">State</label>
    <select name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="ON">Onatario</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
    </select>
    <div class="form-group">
        <label for="exampleInputPassword1">Zip Code</label>
        <input type="number" class="form-control" id="zip" name="zip" placeholder="Enter Zip Code" required>
    </div>

    <h4> Payment Info</h4>

    <div class="form-group">
        <label>Credit Card Number</label>
        <input type="number" class="form-control" id="card_number" name="card_number" placeholder="Enter Card Info" required>
    </div>
    <div class="form-group">
        <label>CVV</label>
        <input type="number" class="form-control" id="cvv" name="cvv" placeholder="Enter CVV" required>
    </div>
    <div class="form-group">
        <label>Expiration Date</label>
        <input type="number" class="form-control" id="expiration_date" name="expiration_date" placeholder="Enter Expiration Date" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Full Name on Card</label>
        <input type="text" class="form-control" id="name" name="name" placeholder=" Enter Full Name on Card" required>
    </div>
    <div class="form-group ">
        <button type="number" class="btn btn-block" id="submitbtn" value="submit" >Check Out</button>
    </div>
</form>
<?php
require 'footer.php'
?>






