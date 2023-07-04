<!DOCTYPE html>
<html>
<head>
	<title>SoftWare ~ Enhancments</title>
	<link rel="stylesheet" href="styles/style.css">
	<meta charset="UTF-8">
</head>
<body>
	<header>
		<?php
			include_once ("header.inc");
			// include_once ("menu.inc");
		?>
	</header>

  <main id="EnhancmentsBody">
	<h1 id="heading1" >Enhancements</h1>

    <div id="EnhancmentsDescription">

        <table id="EnhancmentsDescription">

            <!-- #table -->
            <tr>
              <th>Enhancement Type</th>
              <th>Enhancement Details</th>
            </tr>
            <tr>
              <td>Login page</td>
              <td>Created a login page for managers to log in with the correct emails and passwords</td>
            </tr>
            <tr>
              <td>Sort EOIs by order</td>
              <td>Created new ways to display EOIs in descending and ascending order</td>
            </tr>
            <tr>
              <td>EOI Table</td>
              <td>Created an EOI Table so it stores all the data related to the potential employees.</td>
            </tr>
          </table>
    </div>
       
    
  </main>

	<?php include_once("footer.inc");?>

</body>
</html>