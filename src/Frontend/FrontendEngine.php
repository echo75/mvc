<?php

declare(strict_types=1);

namespace TestProjekt\Frontend;

class FrontendEngine
{
  public function show($file, $data)
  {
    if (!is_array($data)) {
      $html = file_get_contents(__DIR__ . "/../../templates/404.html");
      echo $html;
      exit;
    }
    $html = file_get_contents(__DIR__ . "/../../templates/$file.html");

    // Define custom loop tags
    $loopStartTag = '{users}';
    $loopEndTag = '{/users}';

    // Check if $data is multi-dimensional
    $isMultiDimensional = is_array(current($data)) && is_array(end($data));

    if ($isMultiDimensional) {
      // Find all occurrences of the loop tags
      preg_match_all("#" . preg_quote($loopStartTag) . "(.*?)" . preg_quote($loopEndTag) . "#s", $html, $matches, PREG_SET_ORDER);

      // Check if there are matches
      if (!empty($matches)) {
        $userHtml = '';

        // Iterate over each match
        foreach ($matches as $match) {
          $userTemplate = $match[1]; // Get the content inside the loop

          // Replace placeholders in the user's template for each user individually
          foreach ($data as $userData) {
            $userOutput = $userTemplate;
            foreach ($userData as $key => $value) {
              // Ensure $value is a string
              if (!is_string($value)) {
                $value = strval($value);
              }
              $userOutput = str_replace('{' . $key . '}', $value, $userOutput);
            }
            $userHtml .= $userOutput; // Append the user's HTML to the result
          }
          // Replace the matched loop section with the generated user HTML
          $html = str_replace($match[0], $userHtml, $html);
        }
      }
    } else {
      // If single-dimensional data
      foreach ($data as $key => $value) {
        // Ensure $value is a string
        if (!is_string($value)) {
          $value = strval($value);
        }
        $html = str_replace('{' . $key . '}', $value, $html);
      }
    }

    echo $html;
  }
}
