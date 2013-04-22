<!-- ~$ ssh -L3306:localhost:3306 vampsdev -->
<html><head><title>MySQL Table Viewer</title></head><body>
<?php
// $local_mysqli = new mysqli("localhost", "root", "mvkv55a", "test");
// 
// $db_host = '127.0.0.1';
// $db_user = 'ashipunova';
// $db_pwd = 'paul_mac';

$db_host = 'localhost';
$db_user = 'root';
$db_pwd = 'mvkv55a';


$database = 'test';
// $table = 'vamps_junk_data_cube';
// see http://ashipunova.mbl.edu/~ashipunova/testing_php/vamsdev_test_sql.php

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");
    
// 1) as is
   $mtime = microtime(); 
   $mtime = explode(" ",$mtime); 
   $mtime = $mtime[1] + $mtime[0]; 
   $starttime = $mtime; 


   $my_query1 = 'SELECT DISTINCTROW refhvr_ids,
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--70501015260" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_70501015260",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61201015280" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61201015280",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61207015299" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61207015299",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61212015153" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61212015153",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61212015298" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61212015298",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61212015301" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61212015301",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61214015171" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61214015171",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--70103015344" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_70103015344",
    Distance,
    Sequence,
    Rank,
   taxonomy AS Taxonomy,
    REPLACE(taxonomy,
    ";",
    "\t") AS "Domain\tPhylum\tClass\tOrder\tFamily\tGenus\tSpecies\tStrain" FROM vamps_sequences WHERE ( ( project_dataset="TNO_TNP_Bv6--70501015260" )
   OR( project_dataset="TNO_TNP_Bv6--61201015280" )
   OR( project_dataset="TNO_TNP_Bv6--61207015299" )
   OR( project_dataset="TNO_TNP_Bv6--61212015153" )
   OR( project_dataset="TNO_TNP_Bv6--61212015298" )
   OR( project_dataset="TNO_TNP_Bv6--61212015301" )
   OR( project_dataset="TNO_TNP_Bv6--61214015171" )
   OR( project_dataset="TNO_TNP_Bv6--70103015344" ) ) AND taxonomy LIKE "Bacteria%" GROUP BY Sequence 
   UNION SELECT DISTINCTROW refhvr_ids,
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--70501015260" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_70501015260",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61201015280" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61201015280",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61207015299" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61207015299",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61212015153" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61212015153",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61212015298" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61212015298",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61212015301" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61212015301",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--61214015171" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_61214015171",
    sum(CASE WHEN project_dataset="TNO_TNP_Bv6--70103015344" THEN seq_count ELSE 0 END) AS "TNO_TNP_Bv6_70103015344",
    Distance,
    Sequence,
    Rank,
   taxonomy AS Taxonomy,
    REPLACE(taxonomy,
    ";",
    "\t") AS "Domain\tPhylum\tClass\tOrder\tFamily\tGenus\tSpecies\tStrain" FROM vamps_sequences_pipe WHERE ( ( project_dataset="TNO_TNP_Bv6--70501015260" )
   OR( project_dataset="TNO_TNP_Bv6--61201015280" )
   OR( project_dataset="TNO_TNP_Bv6--61207015299" )
   OR( project_dataset="TNO_TNP_Bv6--61212015153" )
   OR( project_dataset="TNO_TNP_Bv6--61212015298" )
   OR( project_dataset="TNO_TNP_Bv6--61212015301" )
   OR( project_dataset="TNO_TNP_Bv6--61214015171" )
   OR( project_dataset="TNO_TNP_Bv6--70103015344" ) ) AND taxonomy LIKE "Bacteria%" GROUP BY Sequence ORDER BY Taxonomy
   ';
   
   $my_query2 = '
     SELECT DISTINCTROW refhvr_ids,
      Distance,
      Sequence,
      Rank,
     taxonomy AS Taxonomy
     FROM vamps_sequences WHERE (project_dataset in ("TNO_TNP_Bv6--61201015280", "TNO_TNP_Bv6--61207015299", "TNO_TNP_Bv6--61212015153", "TNO_TNP_Bv6--61212015298", "TNO_TNP_Bv6--61212015301", "TNO_TNP_Bv6--61214015171", "TNO_TNP_Bv6--70103015344")
     ) AND taxonomy LIKE "Bacteria%" 
     UNION SELECT DISTINCTROW refhvr_ids,
      Distance,
      Sequence,
      Rank,
     taxonomy AS Taxonomy    
      FROM vamps_sequences_pipe WHERE (project_dataset in ("TNO_TNP_Bv6--61201015280", "TNO_TNP_Bv6--61207015299", "TNO_TNP_Bv6--61212015153", "TNO_TNP_Bv6--61212015298", "TNO_TNP_Bv6--61212015301", "TNO_TNP_Bv6--61214015171", "TNO_TNP_Bv6--70103015344")
     ) AND taxonomy LIKE "Bacteria%"
   ';
   
   echo "HERE1<br/>";

   // $my_query1 = "select * from new_rank";

   $sequence_id_res = mysql_query($my_query2);
   if (!$sequence_id_res) {
       die("Query to show fields from table failed");
   }
   
   while ($row = mysql_fetch_array($sequence_id_res)) {
     // print_r($row);
     // echo "<br/>";
     $my_array['refhvr_ids'] = $row['refhvr_ids'];
     $my_array['project']    = $row['project'];
     $my_array['dataset']    = $row['dataset'];
     $my_array['seq_count']  = $row['seq_count'];
     $my_array['Rank']       = $row['Rank'];
     $my_array['taxonomy']   = $row['taxonomy'];   
     // $sequence_id = $row['sequence_id'];
     // echo "sequence_id = $sequence_id\n";
     // var_dump($row);
     $my_res[] = $row;
   }
   
   
   function rewrite_taxonomy($my_res)
   { 
     $my_arr = array();
     foreach ($my_res as $row)
     {
       $tax_tab = str_replace(";", "\t", $row['Taxonomy']);
       $row["Domain\tPhylum\tClass\tOrder\tFamily\tGenus\tSpecies\tStrain"] = $tax_tab;
       $my_arr[] = $row;            
     }
     // REPLACE(taxonomy,
     // ";",
     // "\t") AS "Domain\tPhylum\tClass\tOrder\tFamily\tGenus\tSpecies\tStrain" 
     return $my_arr;
   } 
   
   $my_arr = rewrite_taxonomy($my_res);
   
   function sum_seq_count()
   {
     
   }

   // $my_query2 = "select DISTINCT project_dataset 
   //   FROM new_sequence_project_dataset join new_project_dataset using(project_dataset_id)
   //    WHERE sequence_id = $sequence_id";
   // 
   // // ----
   // 
   // echo "my_query2 = $my_query2\n";
   // $project_dataset_res = mysql_query($my_query2);
   // if (!$project_dataset_res) {
   //     die("Query to show fields from table failed");
   // }
   // 
   // while ($row = mysql_fetch_array($project_dataset_res)) {
   //   // print_r($row);
   //   // echo "<br/>";
   //   list ($project, $dataset) = preg_split('/--/', $row['project_dataset']);
   //   // print 'PPP: $project = '. "$project; dataset = $dataset\n";
   //   $project_datasets[$project][] = $dataset;
   //   // $ref_nids[$content_type][] = $nid[0];
   //   
   //   // $all_data[] = $row;
   //   // $project_dataset = $row['project_dataset'];
   //   // echo "HERE: $project_dataset\n";
   // }
   // print_r($project_datasets);
   // 
   // // ksort($project_datasets);
   // // foreach ($project_datasets as $key => $val) {
   // //     echo "$key = $val\n";
   // // }
   // 
   //   krsort($project_datasets);
   //   foreach ($project_datasets as $key => $val) {
   //       echo "$key = $val\n";
   //   }
   // 
   // 
   $mtime = microtime(); 
   $mtime = explode(" ",$mtime); 
   $mtime = $mtime[1] + $mtime[0]; 
   $endtime = $mtime; 
   $totaltime = ($endtime - $starttime); 
   echo "All from db in ".$totaltime." seconds<br/>"; 
   print_r($my_arr);

// mysql_free_result($result);
?>
</body></html>
<br/>

