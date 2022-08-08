<?php
require "phpspreadsheet/vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
    <?php
 echo file_get_contents("file/json.txt");
?>
    </section><br>
    <section>
        <h2>Xlsx()</h2>
        <?php
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$spreadsheet = $reader->load("file/php.xlsx");
		$worksheet = $spreadsheet->getActiveSheet();
		$highestRow = $worksheet->getHighestRow(); 
		$highestColumn = $worksheet->getHighestColumn(); 
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
		
		echo '<table style="width:100%;border:1px solid black;border-collapse: collapse;text-align:center">' . "\n";
		for ($row = 1; $row <= $highestRow; ++$row) {
			echo '<tr >' ;
			for ($col = 1; $col <= $highestColumnIndex; ++$col) {
				$value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
				echo '<td style="border:1px solid black;" >' . $value . '</td>';
			}
			echo '</tr>' ;
		}
		echo '</table>';
        ?>
    </section>
    <br>
    <section class="box">
        <h2>Csv()</h2>
		<?php 
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		$spreadsheet = $reader->load("file/code.csv");
		
		$worksheet = $spreadsheet->getActiveSheet();
		$highestRow = $worksheet->getHighestRow(); 
		$highestColumn = $worksheet->getHighestColumn(); 
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
		
		echo '<table style="width:100%;border:1px solid black;border-collapse: collapse;text-align:center">' . "\n";
		for ($row = 1; $row <= $highestRow; ++$row) {
			echo '<tr >' ;
			for ($col = 1; $col <= $highestColumnIndex; ++$col) {
				$value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
				echo '<td style="border:1px solid black;" >' . $value . '</td>';
			}
			echo '</tr>' ;
		}
		echo '</table>';
		?>
	</section><br>
    <?php  
 function read_file_docx($filename){  
      $striped_content = '';  
      $content = '';  
      if(!$filename || !file_exists($filename)) return false;  
      $zip = zip_open($filename);  
      if (!$zip || is_numeric($zip)) return false;  
      while ($zip_entry = zip_read($zip)) {  
      if (zip_entry_open($zip, $zip_entry) == FALSE) continue;  
      if (zip_entry_name($zip_entry) != "word/document.xml") continue;  
      $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));  
      zip_entry_close($zip_entry);  
      }// end while  
      zip_close($zip);  
      $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);  
      $content = str_replace('</w:r></w:p>', "\r\n", $content);  
      $striped_content = strip_tags($content);  
      return $striped_content;  
 }  
 $filename = "file/site.docx";// or /var/www/html/file.docx  
 $content = read_file_docx($filename);  
 if($content !== false) {  
      echo nl2br($content);  
 }  
  else {  
      echo 'Couldn\'t the file. Please check that file.';  
           }  
 ?>  
	</section>
</body>
</html>