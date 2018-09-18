<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
if (class_exists('Uiform_Backup')) {
    return;
}

class Uiform_Backup {
    private $tables = array();
    private $suffix = 'd-M-Y_H-i-s';
    /**
     * Constructor
     *
     * @mvc Controller
     */
    public function __construct() {

        define('nl', "\r\n");
    }

    public function uploadBackupFile() {
        $target_dir = FCPATH . '/backups/';
        $target_file = $target_dir . basename($_FILES["uifm_bkp_fileupload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if file already exists
        if (file_exists($target_file)) {

            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["uifm_bkp_fileupload"]["size"] > 5048576) {

            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "sql") {

            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 0) {
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["uifm_bkp_fileupload"]["tmp_name"], $target_file)) {
                
            } else {
                
            }
        }
    }

    public function restoreBackup($file, $db_name, $db_user, $db_pass, $db_host) {

        $dir = FCPATH . '/backups/';
        $database_file = $dir . $file;
        $database_name = $db_name;
        $database_user = $db_user;
        $datadase_password = $db_pass;
        $database_host = $db_host;

        if ((trim((string) $database_name) != '') 
                && (trim((string) $database_user) != '') 
                && (trim((string) $database_host) != '') 
                && ($conn = @mysql_connect((string) $database_host, (string) $database_user, (string) $datadase_password))) {
            
            /* BEGIN: Select the Database */
            if (!mysql_select_db((string) $database_name, $conn)) {
                $sql = "CREATE DATABASE IF NOT EXISTS `" . (string) $database_name . "`";
                mysql_query($sql, $conn);
                mysql_select_db((string) $database_name, $conn);
            }
            /* END: Select the Database */

            /* BEGIN: Remove All Tables from the Database */


            /* END: Remove All Tables from the Database */

            /* BEGIN: Restore Database Content */
            if (isset($database_file)) {

               /* $database_file = $database_file;
                $sql_file = @file_get_contents($database_file, true);
                $sql_queries = explode(";\n", $sql_file);

                for ($i = 0; $i < count($sql_queries); $i++) {
                    mysql_query($sql_queries[$i], $conn);
                }*/
                
                
                //---------------------------------------------------------------------------
			//Forign code Start here
			//---------------------------------------------------------------------------
			$templine = '';
			// Read in entire file
			$lines = file($database_file);
			// Loop through each line
			foreach ($lines as $line)
			{
			// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
				// Add this line to the current segment
				$templine .= $line;
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';')
				{
					// Perform the query
					mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
					// Reset temp variable to empty
					$templine = '';
				}
			}
			 //echo "Database imported successfully <br/>";
			return true;
                
            }
            
            
            
            
            
        }
    }

    /**
     * Function to build SQL /Importing SQL DATA
     *
     * @param string $args as the queries of sql data , yopu could use file get contents to read data args
     * @param string $dbhost database host
     * @param string $dbuser database user
     * @param string $dbpass database password
     * @param string $dbname database name
     *
     * @return string complete if complete
     */
    public function mysqli_import_sql($file,$uifm_frm_resfile, $args, $dbhost, $dbuser, $dbpass, $dbname) {
        // check mysqli extension installed
        if (!function_exists('mysqli_connect')) {
            die(' This scripts need mysql extension to be running properly ! please resolve!!');
        }
        $mysqli = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($mysqli->connect_error) {
            print_r($mysqli->connect_error);
            return false;
        }
        
        
        $sql_file_OR_content = $file;
        $SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ?  $sql_file_OR_content : file_get_contents($sql_file_OR_content)  );  
	$allLines = explode("\n",$SQL_CONTENT); 
	
        if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();} 
        
		$zzzzzz = $mysqli->query('SET foreign_key_checks = 0');	        
                preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); 
                foreach ($target_tables[2] as $table){
                    $mysqli->query('DROP TABLE IF EXISTS '.$table);
                    
                }         
                $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');    
                $mysqli->query("SET NAMES 'utf8'");	
	$templine = '';	// Temporary variable, used to store current query
	foreach ($allLines as $line)	{											// Loop through each line
		if (substr($line, 0, 2) != '--' && $line != '') {$templine .= $line; 	// (if it is not a comment..) Add this line to the current segment
			if (substr(trim($line), -1, 1) == ';') {		// If it has a semicolon at the end, it's the end of the query
				if(!$mysqli->query($templine)){ print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');  }  $templine = ''; // set variable to empty, to start picking up the lines after ";"
			}
		}
	}	
        
        return 'Importing finished successfully.';
        
        
    }
    
    public function backup_database_mysql( $host, $user, $pass, $name,$tables = '*') {
        
        $data = "\n/*---------------------------------------------------------------".
                "\n  SQL DB BACKUP ".date("d.m.Y H:i")." ".
                "\n  HOST: {$host}".
                "\n  DATABASE: {$name}".
                "\n  TABLES: {$tables}".
                "\n  ---------------------------------------------------------------*/\n";
        $link = mysql_connect($host,$user,$pass);
        mysql_select_db($name,$link);
        mysql_query( "SET NAMES `utf8` COLLATE `utf8_general_ci`" , $link ); // Unicode

        if($tables == '*'){ //get all of the tables
          $tables = array();
          $result = mysql_query("SHOW TABLES");
          while($row = mysql_fetch_row($result)){
            $tables[] = $row[0];
          }
        }else{
          $tables = is_array($tables) ? $tables : explode(',',$tables);
        }

        foreach($tables as $table){
          $data.= "\n/*---------------------------------------------------------------".
                  "\n  TABLE: `{$table}`".
                  "\n  ---------------------------------------------------------------*/\n";           
          
          $res = mysql_query("SHOW CREATE TABLE `{$table}`", $link);
          $row = mysql_fetch_row($res);
          

          $result = mysql_query("SELECT * FROM `{$table}`", $link);
          $num_rows = mysql_num_rows($result);    

          if($num_rows>0){
            
            $data.= "DROP TABLE IF EXISTS `{$table}`;\n";  
            $data.= $row[1].";\n";
              
            $vals = Array(); $z=0;
            for($i=0; $i<$num_rows; $i++){
              $items = mysql_fetch_row($result);
              $vals[$z]="(";
              for($j=0; $j<count($items); $j++){
                if (isset($items[$j])) { $vals[$z].= "'".mysql_real_escape_string( $items[$j], $link )."'"; } else { $vals[$z].= "NULL"; }
                if ($j<(count($items)-1)){ $vals[$z].= ","; }
              }
              $vals[$z].= ")"; $z++;
            }
            
            $data.= "INSERT INTO `{$table}` VALUES ";      
            $data .= "  ".implode(";\nINSERT INTO `{$table}` VALUES ", $vals).";\n";
            
          }
        }
        mysql_close( $link );
        return $data;
    }
    
    
    /**
     * MYSQL EXPORT TO GZIP 
     * exporting database to sql gzip compression data.
     * if directory writable will be make directory inside of directory if not exist, else wil be die
     *
     * @param string directory , as the directory to put file
     * @param $outname as file name just the name !, if file exist will be overide as numeric next ++ as name_1.sql.gz , name_2.sql.gz next ++
     *
     * @param string $dbhost database host
     * @param string $dbuser database user
     * @param string $dbpass database password
     * @param string $dbname database name
     *
     */
    public function backup_database($directory, $outname, $dbhost, $dbuser, $dbpass, $dbname,$tables = '*') {
        
        
        
        // check mysqli extension installed
        if (!function_exists('mysqli_connect')) {
            die(' This scripts need mysql extension to be running properly ! please resolve!!');
        }
        $mysqli = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if ($mysqli->connect_error) {
            print_r($mysqli->connect_error);
            return false;
        }
        $dir = $directory;
        $result = '<p> Could not create backup directory on :' . $dir . ' Please Please make sure you have set Directory on 755 or 777 for a while.</p>';
       
        //$tables = '*';
        
        if($tables == '*') {
            $tables = array();
            $result = mysqli_query($conn,'SHOW TABLES');
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    $tables[] = $row[0];
            }
	} else {
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

	//cycle through data
	$return = "";
	foreach($tables as $table) {
		$result = mysqli_query($conn,'SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);

		$return.= 'DROP TABLE IF EXISTS '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($conn,'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";

		$return2= 'INSERT INTO '.$table." (";
		$cols = mysqli_query($conn,"SHOW COLUMNS FROM ".$table);
		$count = 0;
                $count_global = 0;
		while ($rows = @mysqli_fetch_array($cols, MYSQLI_NUM)) {
			$return2.= $rows[0];
			$count++;
			if ($count < mysqli_num_rows($cols)) {
				$return2.= ",";
			}
		}
                
		$return2.= ")".' VALUES';
		for ($i = 0; $i < $num_fields; $i++) {
			$count = 0;
			while($row = mysqli_fetch_row($result)) {
                            
                            $count_global++;
                            
				$return2.= "\n\t(";
				for($j=0; $j<$num_fields; $j++) {
					$row[$j] = addslashes($row[$j]);
					//$row[$j] = preg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) {
						$return2.= '"'.$row[$j].'"' ;
					} else {
						$return2.= '""';
					}
					if ($j<($num_fields-1)) {
						$return2.= ',';
					}
				}
				$count++;
				if ($count < mysqli_num_rows($result)) {
					$return2.= "),";
				} else {
				$return2.= ");";
				}
			}
		}
		$return2.="\n\n\n";
                
                if($count_global>0){
                    $return.=$return2;
                }
                
	}
        
         
        
        if (true) {
            $name = $outname;
            
            $fullname = $dir . '/' . $name . '.sql'; # full structures
            
             $return = "-- ---------------------------------------------------------
                    --
                    -- zigaform - PHP Form Builder
                    
                    --
                    -- Host Connection Info: " . $mysqli->host_info . "
                    -- Generation Time: " . date('F d, Y \a\t H:i A ( e )') . "
                    -- Server version: " . mysql_get_server_info() . "
                    -- PHP Version: " . PHP_VERSION . "
                    --
                    -- ---------------------------------------------------------\n\n
                    SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
                    SET time_zone = \"+00:00\";
                    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                    /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                    /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                    /*!40101 SET NAMES utf8 */;
                    " . $return . "
                    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
                    # end values result
                    
                    write_file($fullname, $return);
            
        } else {
            $result = '<p>Wrong mysqli input</p>';
        }

        if ($mysqli && !$mysqli->error) {
            @$mysqli->close();
        }
        return $result;
    }

}

?>
