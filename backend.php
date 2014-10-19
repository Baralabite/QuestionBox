<?php		
	/* 
	name: submit_question.php
	author: John "boar401s2" Board
	date: 19/10/2014
	description: 
		This program saves a question submitted by a javascript
		frontend to a file for reading later.

	comments:
		If this code sucks, let me know. It's the first php I've really done.
		Make sure to tell me how to improve though!
	*/
	
	/* Constants */
	define("FILENAME", "questions.txt");
	
	/* Global variables */
	$file = null;	
	
	/* Opens the questions file to append to. */
	function openFile(){
		global $file;
		$file = fopen(FILENAME, "a");
	}
	
	/* Reads in question from GET/POST and writes it to the questions file. */
	function writeQuestion(){
		global $file;
		$question = $_POST["question"];
		fwrite($file, $question."\n\n\n");
	}
	
	/* Closes the file, and saves it(?) */
	function closeFile(){
		global $file;
		fclose($file);
	}	
	
	/* Clears the questions file. */
	function clearFile(){
		$f = fopen(FILENAME, "w");
		fwrite($f, "");
		fclose($f);
	}
	
	/* Reads the required operation from GET and executes. */
	function handleCommand(){
		$command = $_POST["command"];
		
		if($command=="submit"){				//If the command is submit, then write the question to the file.		
			writeQuestion();
			return true;
			
		} elseif ($command=="clear"){		//If the command is clear, then clear the questions file.
			clearFile();
			return true;
			
		} else {
			return false;
		}
	}
		
	/* Main function. Orchestrates the entire proceeding. */
	function main(){
		openFile();
		
		if(array_key_exists("command", $_POST)){	
			$error = handleCommand();
			
			if(!$error){
				die("Command does not exist.");
			} else {
				die("Success!");
			}
			
		} else {
			die("No command found.");
		}
				
		closeFile();
	}
	
	main();
?>