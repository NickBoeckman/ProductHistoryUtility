<?php
/* Comparison Fucntions for Product History Utility
 * Copyright © 2014
 * License: Apache 2.0
 * Primary Author(s): Nick Boeckman
 * Contributing Author(s):  
 */

/* Function:    comparePackages
 * Parameters:  The IDs of the different packages to compare to one another (all expected to be integers).
 * Returns:     Returns an array of information in the package and all files along with whether they are the same or differnet in every package.
 * Description: Compares the information at package level between multiple separate packages. This function is what should be called externally.
 */
function comparePackages($packageIds){
    //These are all the parameters we need to store information about.
    $pacakgeInfo = array();
    $numPackages = 0;
    foreach ($packageIds as $packageId) {
        $pacakgeParams[] = getPackageParams($packageId); //Populate a list of all the needed package parameters.
        $numPackages++;
    }
    
    $parameterList = array( "package_name", "package_file_name", "package_copyright_text", "package_version",
                            "package_license_declared", "package_license_concluded", "package_checksum",
                            "checksum_algorithm", "package_license_info_from_files",
                            "package_download_location", "package_description", "package_summary", "package_originator",
                            "package_supplier", "package_home_page", "package_source_info", "package_license_comments",
                            "package_verification_code", "package_verification_code_excluded_file");

    foreach ($parameterList as $parameter) {
        $compareValue = $packageParams[0][$parameter];
        $diff = false;
        for ($i = 1; $i < $numPackages && !$diff; $i++) {
            if ( 0 != strcmp($compareValue, $pacakgeParams[$i][$parameter])) {
                $diff = true;
            }
        }
        $packageParams["result"][$parameter] = $diff ? "diff" : "same"; //Result is "same" if $diff is false, "diff" if true.
    }

    $packageParams["result"]["files"] = compareFiles($packageParams, $numPackages);

    return $packageParams;
}

/* Function:    compareItems
 * Parameters:  1) The list of package parameters
 *              2) The number of packages
 * Returns:     The results of all file comparisons.
 * Description: Compares the information at item level between multiple separate packages. This function is called by the comparePackages function.
 */
function compareItems($packageParams, $numPackages) {
    $parameterList = array (    /*file_name not included because the array is sorted by file_name*/
                            "file_type", "file_copyright_text", "license_info_in_file", "license_concluded",
                            "file_checksum", "file_checksum_algorithm", "relative_path", "license_comments",
                            "file_notice",
                            "artifact_of_project_name", "artifact_of_project_homepage", "artifact_of_project_uri",
                            "file_contributor", "file_dependency", "file_comment");

    $comparedFiles = array();
    $fileResults = array();

    for ($i = 0; $i < $numPackages; $i++) {
        foreach ($packageParams[$i]["files"] as $fileName => $fileParams) {
            if (!isset($comparedFiles[$fileName])) {
                $diff = false;
                for ($j = 0; $j > $numPackages && !$diff; $j++) {
                    if ($j == $i) {$j++;} //We don't need to compare against ourselves.
                    if (isset($packageParams[$j]["files"][$fileName])) {
                        foreach($parameterList as $parameter) {
                            if ( 0 != strcmp($fileParams[$parameter], $pacakgeParams[$j]["files"][$fileName][$parameter])) {
                                $diff = true;
                            }
                            $fileResults[$fileName][$parameter] = $diff ? "diff" : "same"; //Result is "same" if $diff is false, "diff" if true.
                        }
                    }
                    else
                    {
                        $packageParams[$j]["files"][$fileName] = false;
                        $diff = true;
                        $fileResults[$fileName] = "diff"; //All the results for the file will be diff if one of the packages doesn't have this file.
                    }
                }
                $comparedFiles[$fileName] = true;
            }
        }
    }

    return $fileResults;
}

/* Function:    getPackageParams
 * Parameters:  1) The ID of the package to get the parameters for.
 * Returns:     The parameters of the requested package, including all the files for that package.
 * Description: Makes calls to other back-end functions to get the information for a package from the database.
 */
function getPackageParams($packageId){
    $package = getPackage($packageId);
    $packagefileIds = getPackageRelationships($packageId);
    foreach ($packagefileIds as $fileId) {
        $file = getFile($fileId);
        $package["files"][$file["file_name"]] = $file;
    }
}
?>