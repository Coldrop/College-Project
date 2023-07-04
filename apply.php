<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BED Application Form</title>
    <link rel="icon" type="image/x-icon" href="styles/images/logo.jpg">
    <link href="styles/style.css" rel="Stylesheet">
</head>
<?php
include ("header.inc");
?>


<div class="content">

<h1>BED Job Application Form</h1>
<br>


<form method="post" action="processEOI.php">
    <!-- http://mercury.swin.edu.au/it000000/formtest.php -->
    <article>
		<label id="reference1" for="reference">Job Reference Number</label>
        <input type="text" name= "reference" id="reference"  pattern="[a-zA-Z0-9]{5,5}" minlength="5" maxlength="5" required="required" size="4">
        
        <p></p>
        <br>
    <fieldset class="field_set">  
        <legend class="legend">Personal Details</legend> 
        <br>
        <p><label id="Givenname" for="given_name">Given Name</label>
        <input type="text" name="given_name" id="given_name" pattern="[A-Za-z]{1,20}" maxlength="20" required="required">
        <br>
        <p></p><label id="Familyname" for="family_name">Family Name</label>
        <input type="text" name="family_name" id="family_name" pattern="[A-Za-z]{1,20}" maxlength="20" required="required">
        </p>
        <label id="DOB" for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob" required="required">
        <p></p>
        <label for="gender" id="gender">Gender</label><br>
       
            <label for="gender">Male</label>
            <input type="radio" name="gender" value="male" id="male" required="required">
            
            <label for="gender">Female</label>
            <input type="radio" name="gender" value="female" id="female">

            <label for="gender">Other</label>
            <input type="radio" name="gender" value="other" id="other">
            <br>
    </fieldset>
    <br>
    <fieldset class="field_set">
        <legend class="legend">Address</legend>
        <br>
        <label id="Street" for="street_address">Street Name</label>
        <input type="text" name="street_address" id="street_address" pattern="[A-Za-z]{1,40}" required="required" maxlength="40">
        <br>
        <label id="Suburb" for="suburb">Suburb/Town</label>
        <input type="text" name="suburb" id="suburb" pattern="[A-Za-z]{1,40}" required="required" maxlength="40">
        <br>
        <label id="State" for="state">State</label>
        <select name="state" id="state" required>
            <option value="">Please Select</option>
            <option value="VIC">Victoria</option>
            <option value="NSW">New South Wales</option>
            <option value="QLD">Queensland</option>
            <option value="NT">Northern Territory</option>
            <option value="WA">Western Australia</option>
            <option value="SA">South Australia</option>
            <option value="TAS">Tasmania</option>
            <option value="ACT">Australian Capital Territory</option>
        </select>
      
        <br>
        <label id="Postcode" for="postcode">Postcode</label>
        <input type="text" name="postcode" id="postcode" required="required" pattern="[0-9]{4,4}" maxlength="4">
    </fieldset>
    <br>
    <fieldset class="field_set">
        <legend class="legend">Contact Information</legend>
        <br>
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required="required">
        
        <br>
        <label id="Phone" for="phone_number">Phone Number</label>
        <input type="tel" id="phone_number" name="phone_number" required="required" pattern="[0-9]+{8,12}" maxlength="12">

    </fieldset>
    <br>
    <fieldset class="field_set">
        <legend class="legend">Personal Skills</legend>
        <!-- <p3>Skills</p3> -->
        <br>
        <input type="checkbox" id="skill1" name="skill1" value="html">
        <label id="HTML" for="skills">HTML</label><br>
        <input type="checkbox" id="skill2" name="skill2" value="css">
        <label  id="CSS" for="skills">CSS</label><br>
        <input type="checkbox" id="skill3" name="skill3" value="java">
        <label id="Java" for="skills">Java</label><br><br>
        <label for="skills">Other...</label>
        <input type="textarea" name="otherskill" id="OtherSkills">

    </fieldset>

    <br>  
    <button class="button" type="submit" value="Apply" id="applyb">
    <span>Apply</span>
    </button>  
    <button  class="button1" type="reset" value="Reset form" id="reset"><span>Reset</span></button>
   
</article>


   
</form>










</div>
 
<?php
    include ("footer.inc")
?>   