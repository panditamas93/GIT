
<?php

<form action=\"< include 'tableinsert.php';?>\"><div>
				<select name=\"menu\">
				<option value=\"0\" selected>(please select:)</option>
				<option value=\"1\">one</option>
				<option value=\"2\">two</option>
				<option value=\"3\">three</option>
				<option value=\"other\">other, please specify:</option>
				</select>
				<input type=\"text\" name=\"choicetext\"></div>
				<div><input type=\"submit\" value=\"submit\"></div>
				</form>");
			//	$selectOption = $_POST['taskOption'];




printf("<TR bgcolor='%s' font color='%s' ><TD>%s </TD><TD>%s </TD><TD>",$bgcolor,$fontcolor, $row[0], $row[1]);
		printf("<select>
			<option value=\"Lebensmittel\">Lebensmittel</option>
		<option value=\"Sport\">Sport</option>
		<option value=\"Dienstleistungen\">Dienstleistungen</option>
		<option value=\"Sonstiges\">Sonstiges</option>
		</select>");
		printf("</TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD></TR></br>", 
		 $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]
		, $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18]
		, $row[19]);


?>