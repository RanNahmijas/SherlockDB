<?php 
	// Define MySQL server connection information
	$db_hostname = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_schema = "sherlockHolmesDB"; 

	// Connect to MySQL
	mysql_connect($db_hostname, $db_username, $db_password);

	// Select a default database to work with
	mysql_select_db($db_schema);
        mysql_query("");
        
        $theQuery = " ";
	$tableName= " ";
        
        // The Queries (for each button - differentquery)
	if (isset($_POST['caseTypesQuery'])) 
	{ 
		$entityName = "caseType";
		$tableName= "caseTypes";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['sampleTypesQuery'])) 
	{ 
		$entityName = "sampleType";
		$tableName= "sampleTypes";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['countiesQuery'])) 
	{ 
		$entityName = "county";
		$tableName= "counties";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['countriesQuery'])) 
	{ 
		$entityName = "country";
		$tableName= "countries";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['citiesQuery'])) 
	{ 
		$entityName = "city";
		$tableName= "cities";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['hairColorQuery'])) 
	{ 
		$entityName = "hairColorType";
		$tableName= "hairColorTypes";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['bodyTypesQuery'])) 
	{ 
		$entityName = "bodyType";
		$tableName= "bodyTypes";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['ageRangesQuery'])) 
	{ 
		$entityName = "ageRange";
		$tableName= "ageRanges";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}
        else if (isset($_POST['skillsQuery'])) 
	{ 
		$entityName = "skillsType";
		$tableName= "skillsTypes";
		$theQuery = "
			SELECT ".$entityName."_id as code, ".$entityName."Description as description 
			FROM $tableName
		";
	}        
        else if (isset($_POST['clientsQuery'])) 
	{ 
		$theQuery = "
			SELECT clients.caseNumber, clients.person_id, p.firstName, p.lastName, p.addressLine, c1.countryDescription, c2.countyDescription, c3.cityDescription
                        FROM clientCases clients
                        LEFT JOIN persons p ON clients.person_id = p.person_id
                        LEFT JOIN countries c1 ON p.country_id = c1.country_id
                        LEFT JOIN counties c2 ON p.county_id = c2.county_id
                        LEFT JOIN cities c3 ON p.city_id = c3.city_id
                        ORDER BY clients.caseNumber;
		";
	}
        else if (isset($_POST['suspectsQuery'])) 
	{ 
		$theQuery = "
			SELECT suspects.caseNumber, suspects.person_id, p.firstName, p.lastName, p.addressLine, a.hairColorTypeDescription, b.bodyTypeDescription, d.ageRangeDescription, c1.countryDescription, c2.countyDescription, c3.cityDescription
                        FROM suspectCases suspects
                        LEFT JOIN persons p ON suspects.person_id = p.person_id
                        LEFT JOIN hairColorTypes a ON p.hairColorType_id = a.hairColorType_id
                        LEFT JOIN bodyTypes b ON p.bodyType_id = b.bodyType_id
                        LEFT JOIN ageRanges d ON p.ageRange_id = d.ageRange_id 
                        LEFT JOIN countries c1 ON p.country_id = c1.country_id
                        LEFT JOIN counties c2 ON p.county_id = c2.county_id
                        LEFT JOIN cities c3 ON p.city_id = c3.city_id
                        ORDER BY suspects.caseNumber;
		";
	}
        else if (isset($_POST['informantsQuery'])) 
	{ 
		$theQuery = "
			SELECT informants.caseNumber, informants.person_id, 
                                p.firstName, p.lastName, p.addressLine, c1.countryDescription, c2.countyDescription, c3.cityDescription, d.credibilityTypeDesc
                        FROM informantCases informants
                        LEFT JOIN persons p ON informants.person_id = p.person_id
                        LEFT JOIN countries c1 ON p.country_id = c1.country_id
                        LEFT JOIN counties c2 ON p.county_id = c2.county_id
                        LEFT JOIN cities c3 ON p.city_id = c3.city_id
                        LEFT JOIN credibilityTypes d ON informants.credibilityType_id = d.credibilityType_id
                        ORDER BY informants.caseNumber;
		";
	}
        else if (isset($_POST['criminalsQuery'])) 
	{ 
		$theQuery = "
			SELECT criminal.caseNumber, a.hairColorTypeDescription, b.bodyTypeDescription, c.ageRangeDescription, d.skillsTypeDescription
                        FROM criminalProfileCases criminal
                        LEFT JOIN hairColorTypes a ON criminal.hairColorType_id = a.hairColorType_id
                        LEFT JOIN bodyTypes b ON criminal.bodyType_id = b.bodyType_id
                        LEFT JOIN ageRanges c ON criminal.ageRange_id = c.ageRange_id 
                        LEFT JOIN skillsTypes d ON criminal.skillsType_id = d.skillsType_id
                        ORDER BY criminal.caseNumber;
		";
	}
       else if (isset($_POST['samplesQuery'])) 
	{ 
		$theQuery = "
			SELECT s.caseNumber, a.sampleTypeDescription, s.remarks
                        FROM caseSamples s
                        LEFT JOIN samples b ON s.sample_id = b.sample_id
                        LEFT JOIN sampleTypes a ON b.sampleType_id = a.sampleType_id
                        ORDER BY s.caseNumber;
		";
	}
        else if (isset($_POST['casesListQuery'])) 
	{ 
		$theQuery = "
			SELECT c.caseNumber, a.caseTypeDescription, c.location, 
                                c.crimeDate, c.numberOfVictims, c.remarks, b.statusDescription	
                        FROM cases c
                        LEFT JOIN caseTypes a ON c.caseType_id = a.caseType_id
                        LEFT JOIN caseStatus b ON c.statusNumber = b.statusNumber
                        ORDER BY c.caseNumber;
		";
	}
        else if (isset($_POST['paymentsQuery'])) 
	{ 
		$theQuery = "
			SELECT p.caseNumber, a.paymentDescription, p.amount, p.remarks
                        FROM payments p
                        LEFT JOIN paymentTypes a ON p.paymentType_id = a.paymentType_id
                        ORDER BY p.caseNumber;
		";
	}
        else if (isset($_POST['alibisQuery'])) 
	{ 
		$theQuery = "
			SELECT a.person_id, p.firstName, p.lastName, p.addressLine, a.remarks, a.fromDate, a.toDate, c.credibilityTypeDesc
                        FROM alibis a
                        LEFT JOIN persons p ON a.person_id = p.person_id
                        LEFT JOIN credibilityTypes c ON a.credibilityType_id = c.credibilityType_id
                        WHERE a.alibiNumber <> '-1'
                        ORDER BY a.person_id;
		";
	}
        else if (isset($_POST['midSuspectsQuery'])) 
	{ 
		$theQuery = "
			SELECT  suspects.caseNumber, suspects.person_id, p.firstName, p.lastName, p.addressLine, a.hairColorTypeDescription, b.bodyTypeDescription, d.ageRangeDescription
                        FROM suspectCases suspects
                        LEFT JOIN persons p ON suspects.person_id = p.person_id
                        LEFT JOIN hairColorTypes a ON p.hairColorType_id = a.hairColorType_id
                        LEFT JOIN bodyTypes b ON p.bodyType_id = b.bodyType_id
                        LEFT JOIN ageRanges d ON p.ageRange_id = d.ageRange_id 
                        WHERE ageRangeDescription='Middle aged';
		";
	}
        else if (isset($_POST['devonSuspectsQuery'])) 
	{ 
		$theQuery = "
			SELECT p.person_id, p.firstName, p.lastName, p.addressLine, a.cityDescription, b.countyDescription
                        FROM persons p
                        LEFT JOIN cities a ON p.city_id = a.city_id
                        LEFT JOIN counties b ON p.county_id = b.county_id
                        WHERE countyDescription='Devon';

		";
	}
        else if (isset($_POST['arsenicQuery'])) 
	{ 
		$theQuery = "
			SELECT suspects.caseNumber, suspects.person_id, p.firstName, p.lastName, a.skillsTypeDescription
                        FROM suspectCases suspects
                        LEFT JOIN persons p ON suspects.person_id = p.person_id
                        LEFT JOIN skillsTypes a ON p.skillsType_id = a.skillsType_id
                        WHERE skillsTypeDescription='arsenic acid';
		";
	}
        else if (isset($_POST['incomeQuery'])) 
	{ 
		$theQuery = "
			SELECT SUM(amount) AS TotalIncome FROM payments
                        WHERE paymentType_id='1' OR paymentType_id='2';
		";
	}
        else if (isset($_POST['outcomeQuery'])) 
	{ 
		$theQuery = "
			SELECT SUM(amount) AS TotalOutcome FROM payments
                        WHERE paymentType_id='3' OR paymentType_id='4';
		";
	}
        else if (isset($_POST['murderCaseQuery'])) 
	{ 
		$theQuery = "
			SELECT c.caseNumber, a.caseTypeDescription, c.location, c.crimeDate, c.numberOfVictims, c.remarks, b.statusDescription	
                        FROM cases c
                        LEFT JOIN caseTypes a ON c.caseType_id = a.caseType_id
                        LEFT JOIN caseStatus b ON c.statusNumber = b.statusNumber
                        WHERE caseTypeDescription='Murder case'
                        ORDER BY c.caseNumber;
		";
	}
        else if (isset($_POST['UKcitizenQuery'])) 
	{ 
		$theQuery = "
			SELECT  informants.caseNumber, informants.person_id, p.firstName, p.lastName, p.addressLine, c1.countryDescription, c2.cityDescription, d.credibilityTypeDesc
                        FROM informantCases informants
                        LEFT JOIN persons p ON informants.person_id = p.person_id
                        LEFT JOIN countries c1 ON p.country_id = c1.country_id
                        LEFT JOIN cities c2 ON p.city_id = c2.city_id
                        LEFT JOIN credibilityTypes d ON informants.credibilityType_id = d.credibilityType_id
                        WHERE countryDescription<>'United Kingdom'
                        ORDER BY informants.caseNumber;
		";
	}
        else if (isset($_POST['italySuspectQuery'])) 
	{ 
		$theQuery = "
			SELECT suspects.caseNumber, p.firstName, p.lastName, a.remarks, c.credibilityTypeDesc
                        FROM suspectCases suspects
                        LEFT JOIN persons p ON suspects.person_id = p.person_id
                        LEFT JOIN alibis a ON suspects.alibiNumber = a.alibiNumber
                        LEFT JOIN credibilityTypes c ON a.credibilityType_id = c.credibilityType_id
                        WHERE remarks = 'Alibi Location: Splugen Pass, Italy'
                        ORDER BY suspects.caseNumber;
		";
	}
        else if (isset($_POST['noAlibiQuery'])) 
	{ 
		$theQuery = "
			SELECT suspects.caseNumber, p.firstName, p.lastName, a.remarks
                        FROM suspectCases suspects
                        LEFT JOIN persons p ON suspects.person_id = p.person_id
                        LEFT JOIN alibis a ON suspects.alibiNumber = a.alibiNumber                        
                        WHERE remarks = 'No Alibi'
                        ORDER BY suspects.caseNumber;
               ";
	}
        else if (isset($_POST['alibiOnDateQuery'])) 
	{ 
		$theQuery = "
			SELECT suspects.caseNumber, c.location, suspects.person_id, a.remarks, p.firstName, p.lastName
                        FROM suspectCases suspects
                        LEFT JOIN cases c ON suspects.caseNumber = c.caseNumber
                        LEFT JOIN alibis a ON suspects.alibiNumber = a.alibiNumber
                        LEFT JOIN persons p ON a.person_id = p.person_id
                        WHERE a.toDate = '1889-07-01'
                        ORDER BY suspects.caseNumber;
               ";
	}
        
        // Run the chosen query and put the results' resource into $result variable and checks that there were no errors
	if ($result = mysql_query ($theQuery)) 
	{
		$rows = array();                
		while ( $row = mysql_fetch_assoc($result) )
		{
			$rows[] = $row;
		}
	}
	else
	{
                $errString = mysql_error ();
		echo ("ERROR: $errString");
	}

	// Close the MySQL connection 
	mysql_close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sherlock Holmes DB</title>
        <style>
            body{margin:0; padding:0; font-family:Arial; font-size:7px; direction:ltr;}
            #wrapper{margin:0 auto; width:100%; font-size:11px; direction:ltr;;}
            #asideRight{width:65%; float:right; }
            #asideLeft{width:25%; float:left;margin-left: 5px;}
            header{height:150px; }
            #logo h1{display:block; margin:0px; letter-spacing:-1px; text-align:center; font-size:35px; font-weight:bold; color:#000;}

        </style>
    </head>
    <body>
        <div id="wrapper">
            <header>
			<div id="logo">
                            <h1>
                               Sherlock Holmes DB<img src="sherlockPic.gif" />
                            </h1>
			</div>	
		</header>

            <aside id="asideLeft">
                <form name="dateForm" action="" method="post">                    
                    <input type="submit" value="Case types table" name="caseTypesQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Samples types table" name="sampleTypesQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Countries list" name="countriesQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Counties list" name="countiesQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Cities list" name="citiesQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Hair color types table" name="hairColorQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Body types table" name="bodyTypesQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Age range table" name="ageRangesQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Criminal skills table" name="skillsQuery" style="width:150px; font-size:11px"/><br>                    
                    <br>
                    <input type="submit" value="Clients list" name="clientsQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Suspects list" name="suspectsQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Informants list" name="informantsQuery" style="width:150px; font-size:11px"/><br>                    
                    <input type="submit" value="Alibis list" name="alibisQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Criminal Profile list" name="criminalsQuery" style="width:150px; font-size:11px"/><br>
                    <br>
                    <input type="submit" value="All cases" name="casesListQuery" style="width:150px; font-size:11px"/><br>
                    <input type="submit" value="Samples by cases" name="samplesQuery" style="width:150px; font-size:11px"/><br>
                    <br>
                    <input type="submit" value="Payments" name="paymentsQuery" style="width:150px; font-size:11px"/><br>
                    <br>
                    <table cellpadding='3' style='font-size:11px;'>
                        <tr>
                            <td><label>Show only middle age suspects:&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Show" name="midSuspectsQuery" style="font-size:11px; width:50px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>Show only murder cases:&nbsp;&nbsp;</label></td>
                            <td> <input type="submit" value="Show" name="murderCaseQuery" style="font-size:11px; width:50px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>Who could reach Devon without being noticed?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Find" name="devonSuspectsQuery" style="font-size:11px; width:40px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>Who have skills with arsenic?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Find" name="arsenicQuery" style="font-size:11px; width:40px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>Which of the informants is non-United Kingdom citizen?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Find" name="UKcitizenQuery" style="font-size:11px; width:40px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>What is the total income from the cases?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Find" name="incomeQuery" style="font-size:11px; width:40px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>What is the total outcome from the cases?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Find" name="outcomeQuery" style="font-size:11px; width:40px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>Which of the suspects dosen't have alibi?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Show" name="noAlibiQuery" style="font-size:11px; width:50px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>Which of the suspects have alibi for Italy?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Show" name="italySuspectQuery" style="font-size:11px; width:50px;"/><br></td>
                        </tr>
                        <tr>
                            <td><label>Which of the suspects have alibi for the date : 01.07.1889?&nbsp;&nbsp;</label></td>
                            <td><input type="submit" value="Show" name="alibiOnDateQuery" style="font-size:11px; width:50px;"/><br></td>
                        </tr>
                        
                    </table>           
                 </form>	
            </aside>
            <aside id="asideRight">
                <?php
                        //draw different table foreach query type
                        if (isset($_POST['caseTypesQuery']) ||isset($_POST['sampleTypesQuery']) ||
                                isset($_POST['countriesQuery']) || isset($_POST['countiesQuery']) ||
                                isset($_POST['citiesQuery']) || isset($_POST['hairColorQuery']) ||
                                isset($_POST['bodyTypesQuery']) || isset($_POST['ageRangesQuery']) || isset($_POST['skillsQuery'])) 
                        { 
                                echo "<h4> $tableName </h4>";

                                echo "<table border='1' cellpadding='5' cellspacing='0'>
                                    <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                        <th>Code</th>
                                        <th>Description</th>
                                    </tr>";
                                foreach ($rows as $row)
                                {
                                    echo "<tr>";
                                    echo $code = "<td>".$row['code']."</td>";
                                    echo $description = "<td>".$row['description']."</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                        }
                        else if (isset($_POST['clientsQuery'])) 
                        { 
                            echo "<h4>Clients list:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case Number</th>
                                    <th>Client ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>                                    
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>County</th>
                                    <th>City</th>
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $addressLine = "<td>".$row['addressLine']."</td>";
                                    echo $countryDescription = "<td>".$row['countryDescription']."</td>";
                                    echo $countyDescription = "<td>".$row['countyDescription']."</td>";                                   
                                    echo $cityDescription = "<td>".$row['cityDescription']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['suspectsQuery'])) 
                        { 
                            echo "<h4>Suspects list:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case Number</th>
                                    <th>Suspect ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>                                    
                                    <th>Address</th>
                                    <th>Hair color</th>
                                    <th>Body type</th>
                                    <th>Age range</th>
                                    <th>Country</th>
                                    <th>County</th>
                                    <th>City</th>
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $addressLine = "<td>".$row['addressLine']."</td>";
                                    echo $hairColorTypeDescription = "<td>".$row['hairColorTypeDescription']."</td>";
                                    echo $bodyTypeDescription = "<td>".$row['bodyTypeDescription']."</td>";
                                    echo $ageRangeDescription = "<td>".$row['ageRangeDescription']."</td>";                                    
                                    echo $countryDescription = "<td>".$row['countryDescription']."</td>";
                                    echo $countyDescription = "<td>".$row['countyDescription']."</td>";                                   
                                    echo $cityDescription = "<td>".$row['cityDescription']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['informantsQuery'])) 
                        { 
                            echo "<h4>Informants list:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case Number</th>
                                    <th>Informant ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>                                    
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>County</th>
                                    <th>City</th>
                                    <th>Credibility</th>
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $addressLine = "<td>".$row['addressLine']."</td>";
                                    echo $countryDescription = "<td>".$row['countryDescription']."</td>";
                                    echo $countyDescription = "<td>".$row['countyDescription']."</td>";                                   
                                    echo $cityDescription = "<td>".$row['cityDescription']."</td>";
                                    echo $credibilityTypeDesc = "<td>".$row['credibilityTypeDesc']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['criminalsQuery'])) 
                        { 
                            echo "<h4>Criminal Profile list:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case number</th>                                   
                                    <th>Hair color</th>
                                    <th>Body type</th> 
                                    <th>Age</th>
                                    <th>Criminal skills</th>                                    
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";                                    
                                    echo $hairColorTypeDescription = "<td>".$row['hairColorTypeDescription']."</td>";                                   
                                    echo $bodyTypeDescription = "<td>".$row['bodyTypeDescription']."</td>";
                                    echo $ageRangeDescription = "<td>".$row['ageRangeDescription']."</td>";
                                    echo $skillsTypeDescription = "<td>".$row['skillsTypeDescription']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['samplesQuery'])) 
                        { 
                            echo "<h4>Criminal Profile list:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case number</th>                                   
                                    <th>Description</th>
                                    <th>remarks</th>
                                    </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $sampleTypeDescription = "<td>".$row['sampleTypeDescription']."</td>";
                                    echo $remarks = "<td>".$row['remarks']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['alibisQuery'])) 
                        { 
                            echo "<h4>Alibis list</h4>";
                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>ID</th>                                   
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Home address</th>
                                    <th>Remarks</th>
                                    <th>From date</th>
                                    <th>To date</th>
                                    <th>Credibility</th>
                                </tr>";
                            foreach ($rows as $row)
                            {			
                                    echo "<tr>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";                                    
                                    echo $firstName = "<td>".$row['firstName']."</td>";                                   
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $addressLine = "<td>".$row['addressLine']."</td>";
                                    echo $remarks = "<td>".$row['remarks']."</td>";                                    
                                    echo $fromDate = "<td>".$row['fromDate']."</td>";                                   
                                    echo $toDate = "<td>".$row['toDate']."</td>";
                                    echo $credibilityTypeDesc = "<td>".$row['credibilityTypeDesc']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['casesListQuery'])) 
                        { 
                            echo "<h4>All cases</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case number</th>                                   
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Date of crime</th>
                                    <th>Number of victims</th>
                                    <th>Remarks</th>
                                    <th>Case status</th>
                                </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";                                    
                                    echo $caseTypeDescription = "<td>".$row['caseTypeDescription']."</td>";                                   
                                    echo $location = "<td>".$row['location']."</td>";
                                    echo $crimeDate = "<td>".$row['crimeDate']."</td>";                                    
                                    echo $numberOfVictims = "<td>".$row['numberOfVictims']."</td>";                                   
                                    echo $remarks = "<td>".$row['remarks']."</td>";
                                    echo $statusDescription = "<td>".$row['statusDescription']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['paymentsQuery'])) 
                        { 
                            echo "<h4>Payments</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case number</th>                                   
                                    <th>Description</th>
                                    <th>Amount</th>                                    
                                    <th>Remarks</th>                                    
                                </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";                                    
                                    echo $paymentDescription = "<td>".$row['paymentDescription']."</td>";                                   
                                    echo $amount = "<td>".$row['amount']."</td>";                                                                     
                                    echo $remarks = "<td>".$row['remarks']."</td>";                                   
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['midSuspectsQuery'])) 
                        { 
                            echo "<h4>Suspects list:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case number</th>
                                    <th>Suspect ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>                                    
                                    <th>Address</th>
                                    <th>Hair color</th>
                                    <th>Body type</th>
                                    <th>Age range</th>                                    
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $addressLine = "<td>".$row['addressLine']."</td>";
                                    echo $hairColorTypeDescription = "<td>".$row['hairColorTypeDescription']."</td>";
                                    echo $bodyTypeDescription = "<td>".$row['bodyTypeDescription']."</td>";
                                    echo $ageRangeDescription = "<td>".$row['ageRangeDescription']."</td>";                               
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['murderCaseQuery'])) 
                        { 
                            echo "<h4>Murder cases only:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case number</th>                                   
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Date of crime</th>
                                    <th>Number of victims</th>
                                    <th>Remarks</th>
                                    <th>Case status</th>
                                </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";                                    
                                    echo $caseTypeDescription = "<td>".$row['caseTypeDescription']."</td>";                                   
                                    echo $location = "<td>".$row['location']."</td>";
                                    echo $crimeDate = "<td>".$row['crimeDate']."</td>";                                    
                                    echo $numberOfVictims = "<td>".$row['numberOfVictims']."</td>";                                   
                                    echo $remarks = "<td>".$row['remarks']."</td>";
                                    echo $statusDescription = "<td>".$row['statusDescription']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['devonSuspectsQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>                         
                                    <th>Suspect ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>                                    
                                    <th>Address</th>
                                    <th>City</th>  
                                    <th>County</th>                                                                   
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $addressLine = "<td>".$row['addressLine']."</td>";
                                    echo $cityDescription = "<td>".$row['cityDescription']."</td>";   
                                    echo $countyDescription = "<td>".$row['countyDescription']."</td>";                               
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['arsenicQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>                        
                                    <th>Case number</th>
                                    <th>Person ID</th>  
                                    <th>First Name</th>
                                    <th>Last Name</th>                                    
                                    <th>Skills</th>                                                         
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $skillsTypeDescription = "<td>".$row['skillsTypeDescription']."</td>";                               
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['incomeQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Total income from the cases:</th>                                                         
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";                                    
                                    echo $TotalIncome = "<td>".$row['TotalIncome']."</td>";                                                                  
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['outcomeQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Total expenses:</th>                                                         
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";                                    
                                    echo $TotalOutcome = "<td>".$row['TotalOutcome']."</td>";                                                                  
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['UKcitizenQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                            echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case Number</th>
                                    <th>Informant ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>                                    
                                    <th>Address</th>
                                    <th>Country</th>                                    
                                    <th>City</th>
                                    <th>Credibility</th>
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $addressLine = "<td>".$row['addressLine']."</td>";
                                    echo $countryDescription = "<td>".$row['countryDescription']."</td>";                                                                      
                                    echo $cityDescription = "<td>".$row['cityDescription']."</td>";
                                    echo $credibilityTypeDesc = "<td>".$row['credibilityTypeDesc']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['italySuspectQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                             echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case Number</th>
                                    <th>Suspect first name</th>                                    
                                    <th>Suspect last name</th>                                    
                                    <th>Alibi location</th>                                    
                                    <th>Alibi's credibilityy</th>
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";                                   
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $remarks = "<td>".$row['remarks']."</td>";                                    
                                    echo $credibilityTypeDesc = "<td>".$row['credibilityTypeDesc']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['noAlibiQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                             echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case Number</th>
                                    <th>Suspect first name</th>                                    
                                    <th>Suspect last name</th>                                    
                                    <th></th>
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";                                   
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";
                                    echo $remarks = "<td>".$row['remarks']."</td>";
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else if (isset($_POST['alibiOnDateQuery'])) 
                        { 
                            echo "<h4>Result:</h4>";

                             echo "<table border='1' cellpadding='5' cellspacing='0'>
                                <tr style='background-color:#000000; color:#FFFFFF; font-size:12px;'>
                                    <th>Case Number</th>
                                    <th>Case location</th> 
                                    <th>Suspect ID</th>
                                     <th></th>
                                    <th>Alibi first name</th>
                                    <th>Alibi last name</th>                                    
                                 </tr>";
                            foreach ($rows as $row)
                            {				
                                    echo "<tr>";
                                    echo $caseNumber = "<td>".$row['caseNumber']."</td>";
                                    echo $location = "<td>".$row['location']."</td>";
                                    echo $person_id = "<td>".$row['person_id']."</td>";
                                    echo $remarks = "<td>".$row['remarks']."</td>";
                                    echo $firstName = "<td>".$row['firstName']."</td>";
                                    echo $lastName = "<td>".$row['lastName']."</td>";                               
                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                        
                ?>
              </aside>
         </div>
    </body>
</html>
